<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[AccountController::class,'list'])->name('list');
route::get('/crate',[AccountController::class,'create'])->name('create');

Route::post('/fetch-state/{id}', [AccountController::class, 'fetchStates']);
Route::post('/fetch-cities/{id}', [AccountController::class, 'fetchCities']);

