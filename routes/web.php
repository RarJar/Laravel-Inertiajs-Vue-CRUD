<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/user/create', 'create');
    Route::post('/user/store', 'store');
    Route::get('/user/edit/{user}', 'edit');
    Route::post('/user/update', 'update');
    Route::delete('/destroy/{user}', 'destroy');
    Route::get('/searchUser', 'searchUser');
});
