@extends('layouts.app')

@section('content')
    <h1>{{ __('task.edit_title') }}</h1>

    {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH' , 'class' => 'w-50']) }}
        @include('components.errors')
        {{ Form::textInput('name', __('task.name'), $task->name ?? null) }}
        {{ Form::textField('description', __('task.description'), $task->description ?? null) }}
        {{ Form::selectField('status_id', __('task.status'), $taskStatuses, $task->status->id ?? null, ['placeholder' => 'Status']) }}
        {{ Form::selectField('assigned_to_id', __('task.assignee'), $users, $task->assigned_to_id ?? null, ['placeholder' => 'Assignee']) }}
        {{ Form::selectField('labels', __('task.labels'), $labels, $taskLabels ?? null, ['class' => 'select-multiple', 'multiple' => 'multiple', 'name' => 'labels[]']) }}
        {{ Form::submit(__('task.update_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection