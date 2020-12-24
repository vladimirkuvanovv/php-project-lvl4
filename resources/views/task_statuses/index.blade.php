@extends('layouts.app')

@section('content')
    <h2 class="mb-5">{{ __('task_status.title') }}</h2>

    @if(Auth::check())
        <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">{{ __('task_status.add_new_btn') }}</a>
    @endif

    <table class="table mt-2">
        <thead>
        <tr>
            <th scope="col">{{ __('task_status.id') }}</th>
            <th scope="col">{{ __('task_status.name') }}</th>
            <th scope="col">{{ __('task_status.created_at') }}</th>

            @if(Auth::check())
                <th scope="col">{{ __('task_status.actions') }}</th>
            @endif

        </tr>
        </thead>
        <tbody>
            @foreach($taskStatuses as $taskStatus)
                <tr>
                    <td>{{ $taskStatus->id }}</td>
                    <td>{{ $taskStatus->name }}</td>
                    <td>{{ $taskStatus->created_at }}</td>
                    @if(Auth::check())
                        <td>
                            <a href="{{ route('task_statuses.destroy', $taskStatus) }}" data-confirm="Вы уверены?" class="remove-btn" data-method="delete" rel="nofollow">
                                {{ __('task_status.remove') }}
                            </a>
                            <a href="{{ route('task_statuses.edit', $taskStatus) }}" rel="nofollow" class="edit-btn">{{ __('task_status.edit') }}</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection