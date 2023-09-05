@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Games List</h1>
    <a href="{{ route('games.create') }}" class="btn btn-primary mb-2">Create New Game</a>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($games as $game)
            <tr>
                <td>{{ $game->title }}</td>
                <td>{{ $game->description }}</td>
                <td>{{ $game->release_date }}</td>
                <td>{{ $game->genre }}</td>
                <td>${{ number_format($game->price, 2) }}</td>
                <td>
                    <a href="{{ route('games.show', $game->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No games available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
