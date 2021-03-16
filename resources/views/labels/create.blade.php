@extends('layouts.app')

@section('content')
    <h1>
        {{ __('Создать метку') }}
    </h1>
    {{ Form::model($label, ['url' => route('labels.store')]) }}
    @include('labels.form')
    {{ Form::submit(__('Создать')) }}
    {{ Form::close() }}
@endsection
