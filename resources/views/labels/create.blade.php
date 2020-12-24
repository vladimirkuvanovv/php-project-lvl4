@extends('layouts.app')

@section('content')
    <h2>{{ __('label.create_title') }}</h2>

    {{ Form::model($label, ['url' => route('labels.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
        @include('components.errors')
        {{ Form::textInput('name', __('label.name'), null) }}
        {{ Form::textField('description', __('label.description'), null) }}
        {{ Form::submit(__('label.create_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection