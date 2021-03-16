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
    {{ Form::label('name', __('Имя')) }}
    {{ Form::text('task[name]', $task->name, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('description', __('Описание')) }}
    {{ Form::text('task[description]', $task->description, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('status_id', __('Статус')) }}
    {{ Form::select('task[status_id]', $taskStatuses, $task->status->id, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('assigned_to_id', __('Исполнитель')) }}
    {{ Form::select('task[assigned_to_id]', $performers, $task->performer->id, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('labels', __('Метки')) }}
    {{ Form::select('task[labels][]', $labels, $task->labels->pluck('id'), ['class' => 'form-control', 'multiple' => 'multiple']) }}<br>
</div>
