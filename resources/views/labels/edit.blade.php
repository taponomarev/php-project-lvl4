@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.labels.edit') }}
    </h1>
    {{ Form::model($label, ['url' => route('labels.update', $label), 'method' => 'PATCH']) }}
    @include('labels.form')
    {{ Form::submit(__('messages.update'), ['class' => 'btn btn-success']) }}
    {{ Form::close() }}
@endsection
