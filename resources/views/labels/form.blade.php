@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::label('name', __('Имя')) }}
{{ Form::text('label[name]', $label->name) }}<br>
{{ Form::label('description', __('Описание')) }}
{{ Form::text('label[description]', $label->description) }}<br>
