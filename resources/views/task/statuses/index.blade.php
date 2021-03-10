@extends('layouts.app')

@section('content')
    <h1>Статусы</h1>
    @auth
        <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">Создать статус</a>   
    @endauth
    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Дата создания</th>
            @auth
                <th scope="col">Действия</th>
            @endauth
          </tr>
        </thead>
        <tbody>
            @forelse ($statuses as $status)
                <tr>
                    <th scope="row">{{ $status->id }}</th>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->created_at }}</td>
                    @auth
                        <td>
                            <a href="{{ route('task_statuses.edit', $status->id) }}">Изменить</a>
                            <a href="{{ route('task_statuses.destroy', $status->id) }}">Удалить</a>
                        </td>
                    @endauth
                </tr>
            @empty
                
            @endforelse
        </tbody>
      </table>
@endsection