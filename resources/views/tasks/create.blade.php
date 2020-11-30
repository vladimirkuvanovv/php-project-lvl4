@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Add New Task</h2>

                {{ Form::model($task, ['url' => route('tasks.store'), 'method' => 'POST' , 'class' => 'w-50']) }}
                @include('tasks.form')
                {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection