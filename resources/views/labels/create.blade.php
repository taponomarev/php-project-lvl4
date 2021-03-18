@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.labels.create') }}
    </h1>
    {{ Form::model($label, ['url' => route('labels.store')]) }}
    @include('labels.form')
    {{ Form::submit(__('messages.create'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
