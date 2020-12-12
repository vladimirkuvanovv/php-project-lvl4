@extends('layouts.app')

@section('content')
    <h2>Add New Label</h2>

    {{ Form::model($label, ['url' => route('labels.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
        @include('labels.form')
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection