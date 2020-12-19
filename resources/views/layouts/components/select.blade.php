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
    {{ Form::select('labels[]', $labels, $taskLabels ?? null, ['class' => 'form-control select-multiple', 'multiple' => 'multiple']) }}
</div>