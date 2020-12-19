{{ Form::label('password', __('Password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

<div class="col-md-6">
    {{ Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control', 'required' => 'required', 'autocomplete' => 'current-password']) }}

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>