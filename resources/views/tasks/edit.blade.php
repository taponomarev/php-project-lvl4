@extends('layouts.app')

@section('content')
    <h1>
        {{ __('task.edit') }}
    </h1>
    <div class="col-6">
        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
        @include('tasks.form')
        {{ Form::submit(__('buttons.update'), ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
    </div>
@endsection
