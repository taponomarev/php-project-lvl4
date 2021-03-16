@extends('layouts.app')

@section('content')
    <h1>
        {{ __('Изменение задачи') }}
    </h1>
    <div class="col-6">
        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
        @include('tasks.form')
        {{ Form::submit(__('Обновить'), ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
    </div>
@endsection
