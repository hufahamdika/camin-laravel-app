<?php

use App\Http\Controllers\BookControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/books', [BookControllerAPI::class, 'index']);
Route::get('/book/{id}', [BookControllerAPI::class, 'show']);
Route::post('/books-create', [BookControllerAPI::class, 'store']);
Route::put('/books-update/{id}', [BookControllerAPI::class, 'update']);
Route::delete('books-delete/{id}', [BookControllerAPI::class, 'destroy']);
