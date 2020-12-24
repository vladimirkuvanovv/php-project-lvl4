<div class="form-group">
    {{ Form::label('description', $label ?? null, ['class' => 'control-label']) }}
    {{ Form::textarea('description', $value ?? null, ['class' => 'form-control']) }}
</div>