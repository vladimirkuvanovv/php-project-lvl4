@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">{{ __('dashboard.app') }}</h1>
        <p class="lead">{{ __('dashboard.description') }}</p>
        <hr class="my-4">
        <a href="" class="btn btn-primary btn-lg">{{ __('dashboard.learn_btn') }}</a>
    </div>
@endsection