<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::all(); // Retrieve all games (you can customize this query)

        return view('games.index', compact('games'));
    }
}
