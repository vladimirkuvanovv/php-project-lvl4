@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    {{ Form::open(['url' => route('login'), 'method' => 'POST']) }}
                        <div class="form-group row">
                            @include('auth.components.email')
                        </div>

                        <div class="form-group row">
                            @include('auth.components.password')
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {{ Form::checkbox('remember', 1, old('remember') ? 'checked' : '', ['class' => 'form-check-input']) }}
                                    {{ Form::label('remember', __('Remember Me'), ['class' => 'form-check-label']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @include('auth.components.button', ['name' => __('Login')])
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
