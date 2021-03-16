@extends('layouts.app')

@section('content')
    <h1>
        {{ __('label.edit') }}
    </h1>
    {{ Form::model($label, ['url' => route('labels.update', $label), 'method' => 'PATCH']) }}
    @include('labels.form')
    {{ Form::submit(__('buttons.update'), ['class' => 'btn btn-success']) }}
    {{ Form::close() }}
@endsection
