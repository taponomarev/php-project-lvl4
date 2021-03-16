@extends('layouts.app')

@section('content')
    <h1>
        {{ __('label.create') }}
    </h1>
    {{ Form::model($label, ['url' => route('labels.store')]) }}
    @include('labels.form')
    {{ Form::submit(__('buttons.create'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
