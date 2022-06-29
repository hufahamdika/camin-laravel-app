<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index-books', [BookController::class, 'index'])->name('index.books');


Route::get('/new-books', [BookController::class, 'create'])->name('books.create');
Route::post('/new-books-store', [BookController::class, 'store'])->name('books.new-data');
Route::get('/edit-books/{book:slug}', [BookController::class, 'edit'])->name('books.edit');
Route::post('/update/{book:slug}', [BookController::class, 'update'])->name('books.update');
Route::get('/show/{book:slug}', [BookController::class, 'show'])->name('books.show');
Route::delete('/delete/{book:slug}', [BookController::class, 'destroy'])->name('books.destroy');
