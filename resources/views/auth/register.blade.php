@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {{ Form::open(['url' => route('register'), 'method' => 'POST']) }}
                        <div class="form-group row">
                            @include('auth.components.name')
                        </div>

                        <div class="form-group row">
                            @include('auth.components.email')
                        </div>

                        <div class="form-group row">
                            @include('auth.components.password')
                        </div>

                        <div class="form-group row">
                            @include('auth.components.confirm')
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                @include('auth.components.button', ['name' => __('Register')])
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
