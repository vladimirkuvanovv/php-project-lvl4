@extends('layouts.app')

@section('content')
    <h2 class="mb-5">Task Status</h2>

    @if(Auth::check())
        <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">Add New</a>
    @endif

    <table class="table mt-2">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>

            @if(Auth::check())
                <th scope="col">Actions</th>
            @endif

        </tr>
        </thead>
        <tbody>
            @foreach($taskStatuses ?? [] as $taskStatus)
                <tr>
                    <td>{{ $taskStatus->id }}</td>
                    <td>{{ $taskStatus->name }}</td>
                    <td>{{ $taskStatus->created_at }}</td>
                    @if(Auth::check())
                        <td>
                            <a href="{{ route('task_statuses.destroy', $taskStatus) }}" data-confirm="Вы уверены?" class="remove-btn" data-method="delete" rel="nofollow">Remove</a>
                            <a href="{{ route('task_statuses.edit', $taskStatus) }}" rel="nofollow" class="edit-btn">Edit</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection