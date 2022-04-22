<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MovieQuoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/movie-quotes', [MovieQuoteController::class, 'index']);
Route::get('/movie-quotes/{id}', [MovieQuoteController::class, 'show']);
Route::post('/movie-quotes', [MovieQuoteController::class, 'store']);

Route::put('/movie-quotes/{id}', [MovieQuoteController::class, 'update']);
Route::delete('/movie-quotes/{id}', [MovieQuoteController::class, 'destroy']);
