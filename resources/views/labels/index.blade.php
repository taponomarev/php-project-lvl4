@extends('layouts.app')

@section('content')
    <h1>
        {{ __('label.name') }}
    </h1>
    @auth
        <a href="{{ route('labels.create') }}" class="btn btn-primary">
            {{ __('label.create') }}
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
                {{ __('table.description') }}
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
        @forelse ($labels as $label)
            <tr>
                <td>{{ $label->id }}</td>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                @auth
                    <td>
                        <a href="{{ route('labels.edit', $label) }}">
                            {{ __('buttons.edit') }}
                        </a>
                        <a class="text-danger" href="{{ route('labels.destroy', $label) }}" data-confirm="{{ __('forms.areYouSure') }}" data-method="delete" rel="nofollow">
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

