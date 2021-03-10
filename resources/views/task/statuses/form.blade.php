@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::label('name', __('task_statuses.views.form.name')) }}
{{ Form::text('name', $taskStatus->name) }}<br>
