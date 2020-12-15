@extends('layouts.app')

@section('content')
    <h2 class="mb-5">{{ __('label.title') }}</h2>

    <div class="d-flex">
        @if(Auth::check())
            <a href="{{ route('labels.create') }}" class="btn btn-primary">{{ __('label.add_new_btn') }}</a>
        @endif
    </div>

    <table class="table mt-2">
        <thead>
        <tr>
            <th scope="col">{{ __('label.id') }}</th>
            <th scope="col">{{ __('label.name') }}</th>
            <th scope="col">{{ __('label.description') }}</th>
            <th scope="col">{{ __('label.created_at') }}</th>

            @if(Auth::check())
                <th scope="col">{{ __('label.actions') }}</th>
            @endif
        </tr>
        </thead>
        <tbody>
            @foreach($labels ?? [] as $label)
                <tr>
                    <td>{{ $label->id }}</td>
                    <td>{{ $label->name }}</td>
                    <td>{{ $label->description}}</td>
                    <td>{{ $label->created_at }}</td>

                    @if(Auth::check())
                        <td>
                            <a href="{{ route('labels.destroy', $label) }}" data-confirm="Вы уверены?" class="remove-btn" data-method="delete" rel="nofollow">{{ __('label.remove') }}</a>
                            <a href="{{ route('labels.edit', $label) }}" rel="nofollow" class="edit-btn">{{ __('label.edit') }}</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection