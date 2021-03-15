@extends('layouts.app')

@section('content')
    <h1>
        {{ __('Изменение задачи') }}
    </h1>
    {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
    @include('tasks.form')
    {{ Form::submit(__('Обновить')) }}
    {{ Form::close() }}
@endsection
