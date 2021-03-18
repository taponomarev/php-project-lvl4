@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.tasks.show') . $task->name }}</h1>
    <ul class="list-group">
        <li class="list-group-item">
            {{ __('messages.name') }}: {{ $task->name }}
        </li>
        <li class="list-group-item">
            {{ __('messages.status') }}: {{ $task->status->name }}
        </li>
        <li class="list-group-item">
            {{ __('messages.description') }}: {{ $task->description }}
        </li>
    </ul>
@endsection
