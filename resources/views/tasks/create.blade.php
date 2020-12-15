@extends('layouts.app')

@section('content')
    <h2>{{ __('task.create_title') }}</h2>

    {{ Form::model($task, ['url' => route('tasks.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
    @include('tasks.form')
    {{ Form::submit(__('task.create_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection