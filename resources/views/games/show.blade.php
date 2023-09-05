@extends('layouts.master')

@section('content')
<div class="container">
    <h1>{{ $game->title }}</h1>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/game.jpg') }}" alt="{{ $game->title }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <p><strong>Description:</strong> {{ $game->description }}</p>
            <p><strong>Release Date:</strong> {{ $game->release_date }}</p>
            <p><strong>Genre:</strong> {{ $game->genre }}</p>
            <p><strong>Price:</strong> ${{ number_format($game->price, 2) }}</p>
        </div>
    </div>

    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary my-5">Edit Game</a>
</div>
@endsection
