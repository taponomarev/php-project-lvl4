@extends('layouts.app')

@section('content')
    <h1>
        {{ __('Задачи') }}
    </h1>
    @auth
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            {{ __('Создать задачу') }}
        </a>
    @endauth
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">
                    {{ __('ID') }}
                </th>
                <th scope="col">
                    {{ __('Статус') }}
                </th>
                <th scope="col">
                    {{ __('Имя') }}
                </th>
                <th scope="col">
                    {{ __('Автор') }}
                </th>
                <th scope="col">
                    {{ __('Исполнитель') }}
                </th>
                <th scope="col">
                    {{ __('Дата создания') }}
                </th>
                @auth
                    <th scope="col">
                        {{ __('Действия') }}
                    </th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->status->name }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a>
                    </td>
                    <td>{{ $task->creator->name }}</td>
                    <td>{{ $task->performer->name }}</td>
                    <td>{{ $task->created_at }}</td>
                    @auth
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}">
                                {{ __('Изменить') }}
                            </a>
                            <a class="text-danger" href="{{ route('tasks.destroy', $task) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">
                                {{ __('Удалить') }}
                            </a>
                        </td>
                    @endauth
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
@endsection

