<?php

use App\Http\Controllers\Api\LogbookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/logbooks', [LogbookController::class, 'index']);
Route::post('/logbooks', [LogbookController::class, 'store']);
Route::get('/logbooks/{logbook}', [LogbookController::class, 'show']);
Route::get('/logbooks/{logbook}/edit', [LogbookController::class, 'edit']);
Route::put('/logbooks/{logbook}/edit', [LogbookController::class, 'update']);
Route::delete('/logbooks/{logbook}/delete', [LogbookController::class, 'destroy']);
