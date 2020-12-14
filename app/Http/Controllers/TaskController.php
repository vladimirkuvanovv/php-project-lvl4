<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  Request  $request
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');

        if ($filter) {
            $tasks = QueryBuilder::for(Task::class)
                ->allowedFilters([
                    AllowedFilter::exact('status_id'),
                    AllowedFilter::exact('created_by_id'),
                    AllowedFilter::exact('assigned_to_id'),
                ])
                ->get();
        } else {
            $tasks = Task::all();
        }

        $taskStatuses = TaskStatus::all()
            ->mapWithKeys(fn($taskStatus) => [$taskStatus->id => $taskStatus->name]);

        $users = User::all()
            ->mapWithKeys(fn($user) => [$user->id => $user->name]);

        $creators = $tasks
            ->mapWithKeys(fn($task) => [$task->created_by_id => $users[$task->created_by_id] ?? null]);

        $assignees = $tasks
            ->mapWithKeys(fn($task) => $task->assigned_to_id
                ? [$task->assigned_to_id => $users[$task->assigned_to_id]]
                : []
            );

        return view('tasks.index',
            [
                'tasks'        => $tasks,
                'creators'     => $creators ?? [],
                'assignees'    => $assignees ?? [],
                'taskStatuses' => $taskStatuses,
                'users'        => $users,
                'filter'       => $filter ?? [],
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $task = new Task();

        $taskStatuses = TaskStatus::all()
            ->mapWithKeys(fn($taskStatus) => [$taskStatus->id => $taskStatus->name]);

        $users = User::all()
            ->mapWithKeys(fn($user) => [$user->id => $user->name]);

        $labels = Label::all()
            ->mapWithKeys(fn($label) => [$label->id => $label->name]);

        return view(
            'tasks.create',
            compact(
                'task',
                'users',
                'taskStatuses',
                'labels'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'        => 'required|max:30',
            'description' => 'max:200',
            'status_id'   => 'numeric',
            'labels'      => 'array',
            'assigned_to_id' => 'numeric',
        ]);

        $user = Auth::user();

        $task = $user->tasks()->create($data);

        if (isset($data['labels'])) {
            $task->label()->attach($data['labels']);
        }

        flash('Task was created!')->success();

        return redirect()
            ->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        $labels = $task->label()->get(['name'])->toArray();

        return view('tasks.show', compact('task', 'labels')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        $taskStatuses = TaskStatus::all()
            ->mapWithKeys(fn($taskStatus) => [$taskStatus->id => $taskStatus->name]);

        $users = User::all()
            ->mapWithKeys(fn($user) => [$user->id => $user->name]);

        $taskLabels = $task->label()->allRelatedIds()->all();

        $labels = Label::all()->mapWithKeys(fn($label) => [$label->id => $label->name]);;

        return view(
            'tasks.edit',
            compact(
                'task',
                'taskStatuses',
                'users',
                'labels',
                'taskLabels'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $data = $this->validate($request, [
            'name'           => 'required|max:30|unique:tasks,name,' . $task->id,
            'status_id'      => 'numeric',
            'labels'         => 'array',
            'assigned_to_id' => 'numeric',
            'description'    => 'max:200',
        ]);

        $task->fill($data);
        $task->save();

        $taskLabels = $task->label()->allRelatedIds();

        if (isset($data['labels'])) {
            $newLabels = collect($data['labels'])->diff($taskLabels);
            $task->label()->attach($newLabels);
        }

        flash('Task was successful update!')->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task was removed successfully!');;
    }
}
