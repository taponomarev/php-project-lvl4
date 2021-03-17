@extends('layouts.app')

@section('content')
    <h1>
        {{ trans_choice('task.name', 2) }}
    </h1>
    <div class="filters mb-4">
        {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET', 'class' => 'form-inline']) }}
            {{ Form::select('filter[status_id]', $taskStatuses, session('filter')['status_id'] ?? null, ['class' => 'form-control mr-2', 'placeholder' => __('table.status')]) }}
            {{ Form::select('filter[created_by_id]', $users, session('filter')['created_by_id'] ?? null, ['class' => 'form-control mr-2', 'placeholder' => __('table.creator')]) }}
            {{ Form::select('filter[assigned_to_id]', $users, session('filter')['assigned_to_id'] ?? null, ['class' => 'form-control mr-2', 'placeholder' => __('table.performer')]) }}
            {{ Form::submit(__('buttons.apply'), ['class' => 'btn btn-outline-primary']) }}
        {{ Form::close() }}
    </div>
    @auth
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            {{ __('task.create') }}
        </a>
    @endauth
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">
                    {{ __('table.id') }}
                </th>
                <th scope="col">
                    {{ __('table.status') }}
                </th>
                <th scope="col">
                    {{ __('table.name') }}
                </th>
                <th scope="col">
                    {{ __('table.creator') }}
                </th>
                <th scope="col">
                    {{ __('table.performer') }}
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
                                {{ __('buttons.edit') }}
                            </a>
                            @if(auth()->user()->creator($task))
                                <a class="text-danger" href="{{ route('tasks.destroy', $task) }}" data-confirm="{{ __('forms.areYouSure') }}" data-method="delete" rel="nofollow">
                                    {{ __('buttons.destroy') }}
                                </a>
                            @endif
                        </td>
                    @endauth
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
@endsection

