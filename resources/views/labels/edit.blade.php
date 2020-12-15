@extends('layouts.app')

@section('content')
    <h2>{{ __('label.edit_title') }}</h2>

    {{ Form::model($label, ['url' => route('labels.update', $label), 'method' => 'PATCH' , 'class' => 'w-50']) }}
        @include('labels.form')
        {{ Form::submit(__('label.update_btn'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection