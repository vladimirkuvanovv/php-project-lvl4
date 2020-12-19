@extends('layouts.app')

@section('content')
    <h2>{{ __('task_status.create_title') }}</h2>

    {{ Form::model($taskStatus, ['url' => route('task_statuses.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
        @include('layouts.components.errors')
        @include('layouts.components.text', ['label' => __('task_status.name')])
        {{ Form::submit(__('task_status.create_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection