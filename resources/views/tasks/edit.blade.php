@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH' , 'class' => 'w-50']) }}
        @include('tasks.form')
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection