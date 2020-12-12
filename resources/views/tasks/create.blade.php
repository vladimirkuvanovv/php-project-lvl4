@extends('layouts.app')

@section('content')
    <h2>Add New Task</h2>

    {{ Form::model($task, ['url' => route('tasks.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
    @include('tasks.form')
    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection