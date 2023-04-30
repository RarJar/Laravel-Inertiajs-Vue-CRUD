<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Welcome
    function Welcome(){
        return Inertia::render('Welcome',[
            'users'=> User::all()
        ]);
    }
}
