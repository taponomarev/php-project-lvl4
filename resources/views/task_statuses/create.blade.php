@extends('layouts.app')

@section('content')
    <h1>
        {{ __('task_statuses.views.create.h1') }}
    </h1>
    {{ Form::model($taskStatus, ['url' => route('task_statuses.store')]) }}
        @include('task_statuses.form')
        {{ Form::submit(__('task_statuses.views.form.create_btn')) }}
    {{ Form::close() }}
@endsection
