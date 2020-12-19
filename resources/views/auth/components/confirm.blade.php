{{ Form::label('password-confirm', __('Confirm Password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

<div class="col-md-6">
    {{ Form::password('password', ['class' => 'form-control', 'name' => 'password_confirmation', 'required' => 'required', 'autocomplete' => 'new-password']) }}
</div>