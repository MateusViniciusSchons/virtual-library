<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index'])->name('books.list');
Route::get('/books/create', [bookController::class, 'create'])->name('books.create');
Route::post('/books', [bookController::class, 'store'])->name('books.store');
Route::get('/books/{id}/edit', [bookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [bookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [bookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/{slug}', [BookController::class, 'show'])->name('books.show');
