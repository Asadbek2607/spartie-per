<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/games', [GamesController::class,'index']);

Route::get('/games/create', [GamesController::class,'create'])->name('games.create');

Route::get('/games/{game}', [GamesController::class,'show'])->name('games.show');

Route::get('/games/{game}/edit', [GamesController::class,'edit'])->name('games.edit');

Route::put('/games/{game}/update', [GamesController::class,'update'])->name('games.update');

Route::post('/games', [GamesController::class,'store'])->name('games.store');

Route::delete('/games/{game}', [GamesController::class,'destroy'])->name('games.destroy');

Route::post('/games/{game}/reviews', [ReviewsController::class,'store']);

Route::get('/register', [RegistrationController::class,'create']);
Route::post('/register', [RegistrationController::class,'store']);

Route::get('/login', [SessionsController::class,'create']);
Route::post('/login', [SessionsController::class,'store']);
Route::get('/logout', [SessionsController::class,'destroy']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('games', GamesController::class);
});



