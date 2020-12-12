@extends('layouts.app')

@section('content')
    <h2>Edit Label</h2>

    {{ Form::model($label, ['url' => route('labels.update', $label), 'method' => 'PATCH' , 'class' => 'w-50']) }}
        @include('labels.form')
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection