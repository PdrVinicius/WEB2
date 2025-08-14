<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublishersController;

// Rota para registrar um empréstimo
Route::post('/books/{book}/borrow', [BorrowingController::class, 'store'])->name('books.borrow');

// Rota para listar o histórico de empréstimos de um usuário
Route::get('/users/{user}/borrowings', [BorrowingController::class, 'userBorrowings'])->name('users.borrowings');

// Rota para registrar a devolução
Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
Route::resource('users', UserController::class)->except(['create', 'store', 'destroy']);



Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');

Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
Route::resource('publishers', PublishersController::class);
// Rotas para criação de livros
Route::get('/books/create-id', [BookController::class, 'createWithId'])->name('books.create.id');
Route::post('/books/create-id', [BookController::class, 'storeWithId'])->name('books.store.id');

Route::get('/books/create-select', [BookController::class, 'createWithSelect'])->name('books.create.select');
Route::post('/books/create-select', [BookController::class, 'storeWithSelect'])->name('books.store.select');

// Rotas RESTful para index, show, edit, update, delete (tem que ficar depois das rotas /books/create-id-number e /books/create-select)
Route::resource('books', BookController::class)->except(['create', 'store']);