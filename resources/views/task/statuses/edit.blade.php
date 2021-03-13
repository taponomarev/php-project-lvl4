@extends('layouts.app')

@section('content')
    <h1>
        {{ __('task_statuses.views.edit.h1') }}
    </h1>
    <div class="mt-4">
        {{ Form::model($taskStatus, ['url' => route('task_statuses.update', $taskStatus->id), 'method' => 'PATCH']) }}
            @include('task.statuses.form')
            {{ Form::submit(__('task_statuses.views.form.edit_btn')) }}
        {{ Form::close() }}
    </div>
@endsection
