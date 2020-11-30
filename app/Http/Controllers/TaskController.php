<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tasks = Task::all();

        $taskStatuses = TaskStatus::all()
            ->mapWithKeys(fn($taskStatus) => [$taskStatus->id => $taskStatus->name]);

        $users = User::all()
            ->mapWithKeys(fn($user) => [$user->id => $user->name]);

        $creators = $tasks
            ->mapWithKeys(fn($task) => [$task->created_by_id => $users[$task->created_by_id]]);

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
                'users'        => $users
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

        return view('tasks.create', compact('task', 'users', 'taskStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:30',
            'description' => 'max:200',
            'status_id' => 'numeric',
            'assigned_to_id' => 'numeric',
        ]);

        $data['created_by_id'] = \Auth::id();

        Task::create($data);

        flash('Task was created!')->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
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

        return view('tasks.edit', compact('task', 'taskStatuses', 'users'));
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
            'name' => 'required|max:30|unique:tasks,name,' . $task->id,
            'description' => 'max:200',
            'status_id' => 'numeric',
            'assigned_to_id' => 'numeric',
        ]);

        $task->fill($data);
        $task->save();

        flash('Task was successful update')->success();

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

        return redirect()->route('tasks.index');
    }
}
