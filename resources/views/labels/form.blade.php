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
        {{ Form::label('name', __('table.name')) }}
        {{ Form::text('label[name]', $label->name, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{ Form::label('description', __('table.description')) }}
        {{ Form::text('label[description]', $label->description, ['class' => 'form-control']) }}
    </div>
</div>
