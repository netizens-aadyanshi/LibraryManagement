<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::resource('authors', AuthorController::class);