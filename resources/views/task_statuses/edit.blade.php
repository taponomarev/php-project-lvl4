@extends('layouts.app')

@section('content')
    <h1>
        {{ __('taskStatus.edit') }}
    </h1>
    <div class="mt-4">
        {{ Form::model($taskStatus, ['url' => route('task_statuses.update', $taskStatus->id), 'method' => 'PATCH']) }}
            @include('task_statuses.form')
            {{ Form::submit(__('buttons.update'), ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
    </div>
@endsection
