@extends('layouts.app')

@section('content')
    <h1>{{ __('task.edit_title') }}</h1>

    {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH' , 'class' => 'w-50']) }}
        @include('layouts.components.errors')
        @include('layouts.components.text', ['label' => __('task.name'), 'value' => $task->name ?? null])
        @include('layouts.components.textarea', ['label' => __('task.description'), 'value' => $task->description ?? null])
        @include('layouts.components.select')
        {{ Form::submit(__('task.update_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection