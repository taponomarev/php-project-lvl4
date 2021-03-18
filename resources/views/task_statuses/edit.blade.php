@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.task_statuses.edit') }}
    </h1>
    <div class="mt-4">
        {{ Form::model($taskStatus, ['url' => route('task_statuses.update', $taskStatus->id), 'method' => 'PATCH']) }}
            @include('task_statuses.form')
            {{ Form::submit(__('messages.update'), ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
    </div>
@endsection
