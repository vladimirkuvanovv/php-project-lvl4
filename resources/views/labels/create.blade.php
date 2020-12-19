@extends('layouts.app')

@section('content')
    <h2>{{ __('label.create_title') }}</h2>

    {{ Form::model($label, ['url' => route('labels.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
        @include('layouts.components.errors')
        @include('layouts.components.text', ['label' => __('label.name')])
        @include('layouts.components.textarea', ['label' => __('label.description')])
        {{ Form::submit(__('label.create_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection