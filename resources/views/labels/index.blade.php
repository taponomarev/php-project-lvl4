@extends('layouts.app')

@section('content')
    <h1>
        {{ __('messages.labels.name') }}
    </h1>
    @auth
        <a href="{{ route('labels.create') }}" class="btn btn-primary">
            {{ __('messages.labels.create') }}
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
                {{ __('messages.description') }}
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
        @forelse ($labels as $label)
            <tr>
                <td>{{ $label->id }}</td>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                @auth
                    <td>
                        <a href="{{ route('labels.edit', $label) }}">
                            {{ __('messages.edit') }}
                        </a>
                        <a class="text-danger" href="{{ route('labels.destroy', $label) }}" data-confirm="{{ __('messages.are_you_sure') }}" data-method="delete" rel="nofollow">
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

