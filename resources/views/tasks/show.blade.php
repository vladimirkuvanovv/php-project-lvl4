@extends('layouts.app')

@section('content')
    <h1>{{ __('task.title') }}: {{ $task->name }}
        <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
    </h1>

    <p>{{ __('task.name') }}: {{ $task->name }}</p>
    <p>{{ __('task.status') }}: {{ optional($task->status)->name }}</p>

    @if($task->description)
        <p>{{ __('task.description') }}: {{ $task->description }}</p>
    @endif

    @if($labels)
        <p>{{ __('task.labels') }}:</p>
        <ul>
            @foreach($labels as $label)
                <li>{{ $label->name }}</li>
            @endforeach
        </ul>
    @endif

    <h2>{{ __('task.comments') }}</h2>

    @if(Auth::check())
        {{ Form::open(['url' => route('task.comments.store', $task), 'method' => 'POST' , 'class' => 'w-50']) }}
            {{ Form::textField('comment', __('task.content'), null) }}
            {{ Form::submit(__('task.create_btn'), ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    @endif

    @foreach($task->comments as $comment)
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