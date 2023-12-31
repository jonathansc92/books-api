<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SubjectController;

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('subjects', SubjectController::class);
