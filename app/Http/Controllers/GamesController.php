<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required',
            'release_date' => 'required|date',
            'genre' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Game::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'release_date' => $request->input('release_date'),
            'genre' => $request->input('genre'),
            'price' => $request->input('price'),
        ]);

        return redirect('/games')->with('success', 'Game created successfully');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required',
            'release_date' => 'required|date',
            'genre' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $game->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'release_date' => $request->input('release_date'),
            'genre' => $request->input('genre'),
            'price' => $request->input('price'),
        ]);

        return redirect('/games/' . $game->id)->with('success', 'Game updated successfully');
    }

    public function destroy(Game $game, Request $request)
    {
        $game->delete();
        return redirect('/games')->with('success', 'Game deleted successfully');
    }
}
