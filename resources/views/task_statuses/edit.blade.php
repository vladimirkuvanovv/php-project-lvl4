@extends('layouts.app')

@section('content')
    <h2>{{ __('task_status.edit_title') }}</h2>

    {{ Form::model($taskStatus, ['url' => route('task_statuses.update', $taskStatus), 'method' => 'PATCH', 'class' => 'w-50']) }}
    @include('task_statuses.form')
    {{ Form::submit(__('task_status.update_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection