@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Add New Task Status</h2>

                {{ Form::model($taskStatus, ['url' => route('task_statuses.store'), 'method' => 'POST' , 'class' => 'form-create']) }}
                        @include('task_statuses.form')
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection