@extends('layouts.app')

@section('content')
    <h2>{{ __('task.create_title') }}</h2>

    {{ Form::model($task, ['url' => route('tasks.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
        @include('layouts.components.errors')
        @include('layouts.components.text', ['label' => __('task.name')])
        @include('layouts.components.textarea', ['label' => __('task.description')])
        @include('layouts.components.select')
        {{ Form::submit(__('task.create_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection