@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.tasks.edit') }}
    </h1>
    <div class="col-6">
        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
        @include('tasks.form')
        {{ Form::submit(__('messages.update'), ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
    </div>
@endsection
