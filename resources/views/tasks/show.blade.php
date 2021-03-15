@extends('layouts.app')

@section('content')
    <h1>{{ __('Просмотр задачи: ') . $task->name }}</h1>
    <ul class="list-group">
        <li class="list-group-item">
            {{ __('Имя') }}: {{ $task->name }}
        </li>
        <li class="list-group-item">
            {{ __('Статус') }}: {{ $task->status->name }}
        </li>
        <li class="list-group-item">
            {{ __('Описание') }}: {{ $task->description }}
        </li>
    </ul>
@endsection
