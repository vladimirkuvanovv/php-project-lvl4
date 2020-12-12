@extends('layouts.app')

@section('content')
    <h1>Task: {{ $task->name }}
        <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
    </h1>

    <p>Name: {{ $task->name }}</p>
    <p>Status: {{ $task->status->name }}</p>

    @if($task->description)
        <p>Description: {{ $task->description }}</p>
    @endif

    @if($labels)
        <p>Labels:</p>
        <ul>
            @foreach($labels ?? [] as $label)
                <li>{{ $label['name'] }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Comments</h2>

    @if(Auth::check())
        {{ Form::open(['url' => route('task.comments.store', $task), 'method' => 'POST' , 'class' => 'w-50']) }}
            <div class="form-group">
                {{ Form::label('comment', 'Content', ['class' => 'control-label']) }}
                {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
            </div>
            {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    @endif

    @foreach($task->comments ?? [] as $comment)
        <div class="mt-3 comments">
            <div class="media-list">
                <div class="media">
                    <div class="media-body">
                        <div class="media-heading">
                            <div class="author">{{ $comment->user->name ?? null }}</div>
                            <div class="metadata">
                                <span class="date">
                                    {{ $comment->getCommentDate() }}
                                </span>
                            </div>
                        </div>
                        <div class="media-text text-justify">
                            {{ $comment->comment }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection