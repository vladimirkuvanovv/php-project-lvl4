<div class="form-group">
    {{ Form::label($name, $label ?? null, ['class' => 'control-label']) }}
    {{ Form::textarea($name, $value ?? null, ['class' => 'form-control']) }}
</div>