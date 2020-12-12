@extends('layouts.app')

@section('content')
    <h2>Add New Task Status</h2>

    {{ Form::model($taskStatus, ['url' => route('task_statuses.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
            @include('task_statuses.form')
            {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection