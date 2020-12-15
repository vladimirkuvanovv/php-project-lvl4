@extends('layouts.app')

@section('content')
    <h1>{{ __('task.edit_title') }}</h1>

    {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH' , 'class' => 'w-50']) }}
        @include('tasks.form')
        {{ Form::submit(__('task.update_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection