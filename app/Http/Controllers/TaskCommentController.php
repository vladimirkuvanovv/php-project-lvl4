<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskComment;
use Illuminate\Http\Request;

class TaskCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     */
    public function store(Request $request, Task $task)
    {
        $this->authorize('create', TaskComment::class);

        $data = $this->validate($request,[
            'comment' => 'min:5',
        ]);

        $data['user_id'] = \Auth::id();

        $task->comments()->create($data);

        flash('Your comment has been published successfully')->success();

        return redirect()->route('tasks.show', $task);
    }
}
