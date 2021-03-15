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
{{ Form::text('task[name]', $task->name) }}<br>
{{ Form::label('description', __('Описание')) }}
{{ Form::text('task[description]', $task->description) }}<br>
{{ Form::label('status_id', __('Статус')) }}
{{ Form::text('task[status_id]', $task->status_id) }}<br>
{{ Form::label('assigned_to_id', __('Исполнитель')) }}
{{ Form::text('task[assigned_to_id]', $task->assigned_to_id) }}<br>
