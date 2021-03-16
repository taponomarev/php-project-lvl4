@extends('layouts.app')

@section('content')
    <h1>
        {{ __('taskStatus.create') }}
    </h1>
    {{ Form::model($taskStatus, ['url' => route('task_statuses.store')]) }}
        @include('task_statuses.form')
        {{ Form::submit(__('buttons.create'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
