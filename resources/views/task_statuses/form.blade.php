@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-6 form-group">
    {{ Form::label('name', __('table.name')) }}
    {{ Form::text('name', $taskStatus->name, ['class' => 'form-control']) }}<br>
</div>
