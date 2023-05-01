<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Welcome
    function Welcome(){
        return Inertia::render('Welcome',[
            'users'=> User::orderBy('id','desc')->get()
        ]);
    }

    // Delete
    function Delete($userId){
        User::where('id',$userId)->delete();
        return back()->with(['success_message'=>'A user was deleted successfully']);
    }

    // createPage
    function createPage(){
        return Inertia::render('CreateView');
    }

    // createUser
    function createUser(Request $request){
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('CRUD.welcomePage')->with('success_message', 'Post created successfully!');
    }
}
