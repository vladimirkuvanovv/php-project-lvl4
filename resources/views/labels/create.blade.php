@extends('layouts.app')

@section('content')
    <h2>{{ __('label.create') }}</h2>

    {{ Form::model($label, ['url' => route('labels.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
        @include('labels.form')
        {{ Form::submit(__('label.create_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection