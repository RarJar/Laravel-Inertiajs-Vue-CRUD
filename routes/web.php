<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'Welcome');
    Route::delete('/delete/{userId}', 'Delete');
});
