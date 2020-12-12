@extends('layouts.app')

@section('content')
    <h2>Edit Task Status</h2>

    {{ Form::model($taskStatus, ['url' => route('task_statuses.update', $taskStatus), 'method' => 'PATCH', 'class' => 'w-50']) }}
    @include('task_statuses.form')
    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection