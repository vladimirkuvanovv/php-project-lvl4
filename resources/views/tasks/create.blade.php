@extends('layouts.app')

@section('content')
    <h2>{{ __('task.create_title') }}</h2>

    {{ Form::model($task, ['url' => route('tasks.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
        @include('components.errors')
        {{ Form::textInput('name', __('task.name'), null) }}
        {{ Form::textField('description', __('task.description'), null) }}
        {{ Form::selectField('status_id', __('task.status'), $taskStatuses, null, ['placeholder' => 'Status']) }}
        {{ Form::selectField('assigned_to_id', __('task.assignee'), $users, null, ['placeholder' => 'Assignee']) }}
        {{ Form::selectField('labels', __('task.labels'), $labels, null, ['class' => 'select-multiple', 'multiple' => 'multiple', 'name' => 'labels[]']) }}
        {{ Form::submit(__('task.create_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection