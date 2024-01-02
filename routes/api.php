<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('subjects', SubjectController::class);
Route::post('report', 'App\Http\Controllers\Reports\BookReportController@report');
