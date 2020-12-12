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
    {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
    {{ Form::text('name', $label->name ?? null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
    {{ Form::textarea('description', $label->description ?? null, ['class' => 'form-control']) }}
</div>