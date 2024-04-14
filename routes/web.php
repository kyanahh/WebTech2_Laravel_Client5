<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/', [BookController::class, 'landingpage'])->name('landing');
Route::get('loginpage', [BookController::class, 'loginpage'])->name('log');
Route::get('createaccount', [BookController::class, 'createaccount'])->name('account');
Route::post('createaccount', [BookController::class, 'createuser'])->name('user');
Route::get('homepage', [BookController::class, 'homepage'])->name('home');
Route::post('loginpage', [BookController::class, 'login'])->name('signin');
Route::post('logout', [BookController::class, 'logout'])->name('signout');
Route::get('addbook', [BookController::class, 'addbook'])->name('add');
Route::post('addbook', [BookController::class, 'store'])->name('storage');
Route::get('booklist', [BookController::class, 'booklist'])->name('tables');
Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edits');
Route::put('/{book}', [BookController::class, 'update'])->name('updates');
Route::delete('/{book}', [BookController::class, 'destroy'])->name('delete');