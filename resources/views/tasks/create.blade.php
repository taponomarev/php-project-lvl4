@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.tasks.create') }}
    </h1>
    <div class="col-6">
        {{ Form::model($task, ['url' => route('tasks.store')]) }}
        @include('tasks.form')
        {{ Form::submit(__('messages.create'), ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
@endsection
