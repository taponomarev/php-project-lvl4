@extends('layouts.app')

@section('content')
    <h1>{{ __('task.show') . $task->name }}</h1>
    <ul class="list-group">
        <li class="list-group-item">
            {{ __('table.name') }}: {{ $task->name }}
        </li>
        <li class="list-group-item">
            {{ __('table.status') }}: {{ $task->status->name }}
        </li>
        <li class="list-group-item">
            {{ __('table.description') }}: {{ $task->description }}
        </li>
    </ul>
@endsection
