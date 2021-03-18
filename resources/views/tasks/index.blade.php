@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.tasks.name') }}
    </h1>
    <div class="filters mb-4">
        {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET', 'class' => 'form-inline']) }}
            {{ Form::select('filter[status_id]', $taskStatuses, session('filter')['status_id'] ?? null, ['class' => 'form-control mr-2', 'placeholder' => __('messages.status')]) }}
            {{ Form::select('filter[created_by_id]', $users, session('filter')['created_by_id'] ?? null, ['class' => 'form-control mr-2', 'placeholder' => __('messages.creator')]) }}
            {{ Form::select('filter[assigned_to_id]', $users, session('filter')['assigned_to_id'] ?? null, ['class' => 'form-control mr-2', 'placeholder' => __('messages.performer')]) }}
            {{ Form::submit(__('messages.apply'), ['class' => 'btn btn-outline-primary']) }}
        {{ Form::close() }}
    </div>
    @auth
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            {{ __('messages.tasks.create') }}
        </a>
    @endauth
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">
                    {{ __('messages.id') }}
                </th>
                <th scope="col">
                    {{ __('messages.status') }}
                </th>
                <th scope="col">
                    {{ __('messages.name') }}
                </th>
                <th scope="col">
                    {{ __('messages.creator') }}
                </th>
                <th scope="col">
                    {{ __('messages.performer') }}
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
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->status->name }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a>
                    </td>
                    <td>{{ $task->creator->name }}</td>
                    <td>{{ $task->performer->name }}</td>
                    <td>{{ $task->created_at->format('d.m.Y') }}</td>
                    @auth
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}">
                                {{ __('messages.edit') }}
                            </a>
                            @can('delete', $task)
                                <a class="text-danger" href="{{ route('tasks.destroy', $task) }}" data-confirm="{{ __('messages.are_you_sure') }}" data-method="delete" rel="nofollow">
                                    {{ __('messages.destroy') }}
                                </a>
                            @endcan
                        </td>
                    @endauth
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
@endsection

