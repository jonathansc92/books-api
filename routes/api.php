<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('subjects', SubjectController::class);

Route::group(['middleware' => ['access-control:DEMANDA_DEMANDA_CADASTRAR']], function () {
    Route::resource('topics', TopicController::class);
});

Route::group(['prefix' => 'reports'], function () {
    Route::group(['prefix' => 'books'], function () {
        Route::get('/', 'App\Http\Controllers\Reports\BookReportController@index');
        Route::post('/export', 'App\Http\Controllers\Reports\BookReportController@report');
    });
});
