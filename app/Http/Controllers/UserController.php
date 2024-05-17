<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        return Inertia::render('index', [
            'users' => User::latest()->paginate(7)
        ]);
    }

    function create()
    {
        return Inertia::render('create');
    }

    function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('index')->with('message', 'User created successfully');
    }

    function edit(User $user)
    {
        return Inertia::render('edit', [
            'user' => $user
        ]);
    }

    function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id
        ]);

        User::whereEmail($request->email)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('index')->with('message', 'User updated successfully');
    }

    function destroy(User $user)
    {
        $user->delete();
        return back()->with(['message' => 'User deleted successfully']);
    }

    function searchUser()
    {
        $searchData = request('key');

        $users = User::when($searchData, function ($p) {
            $searchData = request('key');
            $p->where('name', 'like', '%' . $searchData . '%');
        })->orderBy('id', 'desc')->paginate(7);

        return Inertia::render('index', [
            'users' => $users,
            'search_value' => $searchData
        ]);
    }
}
