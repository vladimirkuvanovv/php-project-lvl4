@extends('layouts.app')

@section('content')
    <h2 class="mb-5">Labels</h2>

    <div class="d-flex">
        @if(Auth::check())
            <a href="{{ route('labels.create') }}" class="btn btn-primary">Add New</a>
        @endif
    </div>

    <table class="table mt-2">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>

            @if(Auth::check())
                <th scope="col">Actions</th>
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
                            <a href="{{ route('labels.destroy', $label) }}" data-confirm="Вы уверены?" class="remove-btn" data-method="delete" rel="nofollow">Remove</a>
                            <a href="{{ route('labels.edit', $label) }}" rel="nofollow" class="edit-btn">Edit</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection