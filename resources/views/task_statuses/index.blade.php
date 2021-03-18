@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.task_statuses.name') }}
    </h1>
    @auth
        <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
            {{ __('messages.task_statuses.create') }}
        </a>
    @endauth
    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">
                {{ __('messages.id') }}
            </th>
            <th scope="col">
                {{ __('messages.name') }}
            </th>
            <th scope="col">
                {{ __('messages.created_at') }}
            </th>
            @auth
                <th scope="col">
                    {{ __('messages.actions') }}
                </th>
            @endauth
          </tr>
        </thead>
        <tbody>
            @forelse ($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->created_at->format('d.m.Y') }}</td>
                    @auth
                        <td>
                            <a href="{{ route('task_statuses.edit', $status) }}">
                                {{ __('messages.edit') }}
                            </a>
                            <a class="text-danger" href="{{ route('task_statuses.destroy', $status) }}" data-confirm="{{ __('messages.are_you_sure') }}" data-method="delete" rel="nofollow">
                                {{ __('messages.destroy') }}
                            </a>
                        </td>
                    @endauth
                </tr>
            @empty

            @endforelse
        </tbody>
      </table>
@endsection
