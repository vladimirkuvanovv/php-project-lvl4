@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::label('name', __('task.name'), ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', __('task.description'), ['class' => 'control-label']) }}
    {{ Form::textarea('description', $task->description, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('status_id', __('task.status'), ['class' => 'control-label']) }}
    {{ Form::select('status_id', $taskStatuses, $task->status->id ?? null, ['placeholder' => 'Status', 'class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('assigned_to_id', __('task.assignee'), ['class' => 'control-label']) }}
    {{ Form::select('assigned_to_id', $users, $task->assigned_to_id ?? null, ['placeholder' => 'Assignee', 'class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('labels', __('task.labels'), ['class' => 'control-label']) }}
    {{ Form::select('labels[]', $labels, $taskLabels ?? null, ['class' => 'form-control', 'multiple' => 'multiple']) }}
</div>

{{--
<div class="form-group">
    <select class="selectpicker" multiple data-live-search="true">
        <option>Mustard</option>
        <option>Ketchup</option>
        <option>Relish</option>
    </select>
</div>--}}
