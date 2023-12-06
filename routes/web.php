<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\transactionController;


Route::get('student', [StudentController::class, 'list']);
Route::get('student/{id}', [StudentController::class, 'getById']);
Route::get('search', [SearchController::class, 'showSearchForm']);
Route::post('search', [SearchController::class, 'search']);

Route::view('master', 'master');

Route::get('/account', [AccountController::class, 'account']);
Route::get('/account/{id}', [AccountController::class, 'getById'])->name('accountdetail');

Route::get('transaction', [TransactionController::class, 'showTransaction']);
Route::post('transaction', [TransactionController::class, 'registerPost']);
Route::get('transactiondetail',[transactionController::class,'aa']);
