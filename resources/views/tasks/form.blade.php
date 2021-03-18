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
    {{ Form::label('name', __('messages.name')) }}
    {{ Form::text('name', $task->name, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('description', __('messages.description')) }}
    {{ Form::text('description', $task->description, ['class' => 'form-control']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('status_id', __('messages.status')) }}
    {{ Form::select('status_id', $taskStatuses, $task->status->id, ['class' => 'form-control', 'placeholder' => '________']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('assigned_to_id', __('messages.performer')) }}
    {{ Form::select('assigned_to_id', $performers, $task->performer->id, ['class' => 'form-control', 'placeholder' => '________']) }}<br>
</div>
<div class="form-group">
    {{ Form::label('labels', __('messages.labels.name'), ['class' => 'text-transform']) }}
    {{ Form::select('labels[]', $labels, $task->labels->pluck('id'), ['class' => 'form-control', 'multiple' => 'multiple']) }}<br>
</div>
