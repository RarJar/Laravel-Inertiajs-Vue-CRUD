<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'Welcome')->name('CRUD.welcomePage');

    Route::delete('/delete/{userId}', 'Delete');

    Route::get('/createPage', 'createPage');

    Route::post('/createUser', 'createUser');

    Route::get('/toUpdateUserPage/{userId}', 'toUpdateUserPage');
    
    Route::post('/updateUser', 'updateUser');

    Route::get('/searchUser', 'searchUser');
});
