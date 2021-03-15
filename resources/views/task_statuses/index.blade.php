@extends('layouts.app')

@section('content')
    <h1>
        {{ __('task_statuses.views.index.h1') }}
    </h1>
    @auth
        <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
            {{ __('task_statuses.views.index.create_status_btn') }}
        </a>
    @endauth
    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">
                {{ __('task_statuses.views.index.table.thead.id') }}
            </th>
            <th scope="col">
                {{ __('task_statuses.views.index.table.thead.name') }}
            </th>
            <th scope="col">
                {{ __('task_statuses.views.index.table.thead.created_at') }}
            </th>
            @auth
                <th scope="col">
                    {{ __('task_statuses.views.index.table.thead.action') }}
                </th>
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
                            <a href="{{ route('task_statuses.edit', $status) }}">
                                {{ __('task_statuses.views.index.table.tbody.edit_link') }}
                            </a>
                            <a class="text-danger" href="{{ route('task_statuses.destroy', $status) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">
                                {{ __('task_statuses.views.index.table.tbody.destroy_link') }}
                            </a>
                        </td>
                    @endauth
                </tr>
            @empty

            @endforelse
        </tbody>
      </table>
@endsection
