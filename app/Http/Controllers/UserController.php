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
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8'
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('CRUD.welcomePage')->with('success_message', 'A user was created successfully');
    }

    // toUpdateUserPage
    function toUpdateUserPage($userId){
        return Inertia::render('EditView', [
            'users'=> User::where('id',$userId)->orderBy('id','desc')->first()
        ]);
    }

    // updateUser
    function updateUser(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email,' . $request->id
        ]);

        User::where('email',$request->email)->update([
            'name'=> $request->name,
            'email'=> $request->email
        ]);
        return redirect()->route('CRUD.welcomePage')->with('success_message', 'A user was updated successfully');
    }

    // searchUser
    function searchUser(){
        $searchData = request('key');

        $users = User::when($searchData,function($p){
            $searchData = request('key');
            $p->where('name','like','%' . $searchData .'%');
        })->orderBy('id','desc')->get();

        return Inertia::render('Welcome',[
            'users'=> $users,
            'search_value' =>$searchData
        ]);
    }
}
