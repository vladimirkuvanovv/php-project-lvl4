{{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

<div class="col-md-6">
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
</div>--}}

{{ Form::label('name', __('Name'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
<div class="col-md-6">
    {{ Form::text('name', old('name') ?? null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required' => 'required', 'autocomplete' => 'name', 'autofocus' => 'autofocus']) }}

    @error('name')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>