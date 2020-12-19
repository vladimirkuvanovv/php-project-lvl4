@extends('layouts.app')

@section('content')
    <h2 class="mb-5">{{ __('task.title') }}</h2>

    <div class="d-flex">
        <div>
            {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET' , 'class' => 'form-inline']) }}
                {{ Form::select('filter[status_id]', $taskStatuses, $filter['status_id'] ?? null, ['placeholder' => __('task.status'), 'class' => 'form-control mr-2']) }}
                {{ Form::select('filter[created_by_id]', $creators, $filter['created_by_id'] ?? null, ['placeholder' => __('task.creator'), 'class' => 'form-control mr-2']) }}
                {{ Form::select('filter[assigned_to_id]', $assignees, $filter['assigned_to_id'] ?? null, ['placeholder' => __('task.assignee'), 'class' => 'form-control mr-2']) }}
                {{ Form::submit(__('task.filter_btn'), ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>

        @if(Auth::check())
            <a href="{{ route('tasks.create') }}" class="btn btn-primary ml-auto">{{ __('task.add_new_btn') }}</a>
        @endif
    </div>
    <table class="table mt-2">
        <thead>
        <tr>
            <th scope="col">{{ __('task.id') }}</th>
            <th scope="col">{{ __('task.status') }}</th>
            <th scope="col">{{ __('task.name') }}</th>
            <th scope="col">{{ __('task.creator') }}</th>
            <th scope="col">{{ __('task.assignee') }}</th>
            <th scope="col">{{ __('task.created_at') }}</th>

            @if(Auth::check())
                <th scope="col">{{ __('task.actions') }}</th>
            @endif
        </tr>
        </thead>
        <tbody>
            @foreach($tasks ?? [] as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ optional($task->status)->name }}</td>
                    <td><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                    <td>{{ optional($task->user)->name }}</td>
                    <td>{{ $users[$task->assigned_to_id] ?? '' }}</td>
                    <td>{{ $task->created_at }}</td>

                    @if(Auth::check())
                        <td>
                            @can('delete', $task)
                                <a href="{{ route('tasks.destroy', $task->id) }}" data-confirm="Вы уверены?" class="remove-btn" data-method="delete" rel="nofollow">
                                    {{ __('task.remove') }}
                                </a>
                            @endcan
                            <a href="{{ route('tasks.edit', $task) }}" rel="nofollow" class="edit-btn">{{ __('task.edit') }}</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection