@extends('layouts.app')

@section('content')
    <h1>
        {{ __('Метки') }}
    </h1>
    @auth
        <a href="{{ route('labels.create') }}" class="btn btn-primary">
            {{ __('Создать метку') }}
        </a>
    @endauth
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">
                {{ __('ID') }}
            </th>
            <th scope="col">
                {{ __('Имя') }}
            </th>
            <th scope="col">
                {{ __('Описание') }}
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
        @forelse ($labels as $label)
            <tr>
                <th scope="row">{{ $label->id }}</th>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at }}</td>
                @auth
                    <td>
                        <a href="{{ route('labels.edit', $label) }}">
                            {{ __('Изменить') }}
                        </a>
                        <a class="text-danger" href="{{ route('labels.destroy', $label) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">
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

