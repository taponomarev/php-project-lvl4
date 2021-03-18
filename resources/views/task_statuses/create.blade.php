@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.task_statuses.create') }}
    </h1>
    {{ Form::model($taskStatus, ['url' => route('task_statuses.store')]) }}
        @include('task_statuses.form')
        {{ Form::submit(__('messages.create'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
