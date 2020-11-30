@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Task: {{ $task->name }}
                    <a href="{{ route('tasks.edit', $task) }}">*</a>
                </h1>

                <p>Name: {{ $task->name }}</p>
                <p>Status: {{ $task->status->name }}</p>
                <p>Description: {{ $task->description }}</p>
                <p>Labels:</p>
                <ul>
                    @foreach([] as $label)
                        <li></li>
                    @endforeach
                </ul>

                <h2>Comments</h2>
                {{ Form::open(['url' => route('tasks.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
                    <div class="form-group">
                        {{ Form::label('comment', 'Content', ['class' => 'control-label']) }}
                        {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
                    </div>
                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection