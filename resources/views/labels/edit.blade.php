@extends('layouts.app')

@section('content')
    <h1>
        {{ __('Изменение метки') }}
    </h1>
    {{ Form::model($label, ['url' => route('labels.update', $label), 'method' => 'PATCH']) }}
    @include('labels.form')
    {{ Form::submit(__('Обновить')) }}
    {{ Form::close() }}
@endsection
