@extends('layouts.app')

@section('content')
    <h1>
        {{ __('Создать задачу') }}
    </h1>
    {{ Form::model($task, ['url' => route('tasks.store')]) }}
    @include('tasks.form')
    {{ Form::submit(__('Создать')) }}
    {{ Form::close() }}
@endsection
