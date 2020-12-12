<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $taskStatuses = TaskStatus::all();

        return view('task_statuses.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
        dd($taskStatus);

        return view('task_statuses.create', compact('taskStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:20'
        ]);

        TaskStatus::create($data);

        flash('Task status was successful save!')->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $taskStatus = TaskStatus::findOrFail($id);

        return view('task_statuses.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $taskStatus = TaskStatus::findOrFail($id);

        $data = $this->validate($request, [
            'name' => 'required|max:20|unique:task_statuses,name,' . $taskStatus->id,
        ]);

        $taskStatus->fill($data);
        $taskStatus->save();

        flash('Status was successful update')->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        TaskStatus::destroy($id);

        return redirect()->route('task_statuses.index');
    }
}
