@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('flash::message')
                <h2>Task Status</h2>
                <a href="{{ route('task_statuses.create') }}" class="btn btn-primary add-task">Add New</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>

                        @if(\Illuminate\Support\Facades\Auth::check())
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
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <td>
                                        <a href="{{ route('task_statuses.destroy', $taskStatus) }}" data-confirm="Вы уверены?" class="remove-btn" data-method="delete" rel="nofollow">Remove</a>
                                        <a href="{{ route('task_statuses.edit', $taskStatus) }}" rel="nofollow" class="edit-btn">Edit</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection