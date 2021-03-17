@extends('layouts.app')

@section('content')
    <h1>
        {{ __('taskStatus.name') }}
    </h1>
    @auth
        <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
            {{ __('taskStatus.create') }}
        </a>
    @endauth
    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">
                {{ __('table.id') }}
            </th>
            <th scope="col">
                {{ __('table.name') }}
            </th>
            <th scope="col">
                {{ __('table.created_at') }}
            </th>
            @auth
                <th scope="col">
                    {{ __('table.actions') }}
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
                                {{ __('buttons.edit') }}
                            </a>
                            <a class="text-danger" href="{{ route('task_statuses.destroy', $status) }}" data-confirm="{{ __('forms.areYouSure') }}" data-method="delete" rel="nofollow">
                                {{ __('buttons.destroy') }}
                            </a>
                        </td>
                    @endauth
                </tr>
            @empty

            @endforelse
        </tbody>
      </table>
@endsection
