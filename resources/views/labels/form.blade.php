@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-6">
    <div class="form-group">
        {{ Form::label('name', __('messages.name')) }}
        {{ Form::text('name', $label->name, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{ Form::label('description', __('messages.description')) }}
        {{ Form::text('description', $label->description, ['class' => 'form-control']) }}
    </div>
</div>
