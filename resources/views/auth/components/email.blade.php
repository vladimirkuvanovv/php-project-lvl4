{{ Form::label('email', __('E-Mail Address'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
<div class="col-md-6">
    {{ Form::email('email', old('email'), ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required' => 'required', 'autocomplete' => 'email', 'autofocus' => 'autofocus']) }}

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>