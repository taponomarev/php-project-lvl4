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
    {{ Form::label('name', __('table.name')) }}
    {{ Form::text('task[name]', $task->name, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('description', __('table.description')) }}
    {{ Form::text('task[description]', $task->description, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('status_id', __('table.status')) }}
    {{ Form::select('task[status_id]', $taskStatuses, $task->status->id, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('assigned_to_id', __('table.performer')) }}
    {{ Form::select('task[assigned_to_id]', $performers, $task->performer->id, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('labels', __('table.labels'), ['class' => 'text-transform']) }}
    {{ Form::select('task[labels][]', $labels, $task->labels->pluck('id'), ['class' => 'form-control', 'multiple' => 'multiple']) }}<br>
</div>
