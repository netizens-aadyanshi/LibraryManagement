<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('authors', AuthorController::class);

    Route::resource('books', BookController::class);

    Route::resource('members', MemberController::class);

    // Toggle active/inactive
    Route::put('members/{member}/toggle', [MemberController::class, 'toggle'])->name('members.toggle');

    Route::post('books/{book}/borrow', [BorrowController::class, 'borrow'])->name('books.borrow');
    Route::put('borrows/{borrow}/return', [BorrowController::class, 'return'])->name('borrows.return');
    Route::get('borrows', [BorrowController::class, 'index'])->name('borrows.index');
});

require __DIR__.'/auth.php';
