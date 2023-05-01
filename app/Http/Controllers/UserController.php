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
            'users'=> User::get()
        ]);
    }

    // Delete
    function Delete($userId){
        User::where('id',$userId)->delete();
        return back()->with(['delete_success'=>'A user was deleted successfully']);
    }
}
