@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Edit Game</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('games.update', $game->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $game->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $game->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" value="{{ $game->release_date }}" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="{{ $game->genre }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $game->price }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Update Game</button>
    </form>
</div>
@endsection
