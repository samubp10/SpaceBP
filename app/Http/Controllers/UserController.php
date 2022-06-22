<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illumination\Support\Facades\Validator;

class UserController extends Controller
{
    public function show()
    {

        $users = User::all();
        return view('administration.users', ['users' => $users]);
    }

    public function edit(User $user)
    {
        return view('administration.editUser', ['user' => $user]);
    }

    public function update(Request $req, User $user)
    {
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'idRole' => 'required|integer|between:1,3'
        ]);
        $user->update(['name' => $req->name, 'email' => $req->email, 'idRole' => $req->idRole]);
        return redirect()->route('user.show', app()->getLocale());
    }

    public function delete(User $user)
    {
        // dd($user);
        $user->delete();
        return redirect()->route('user.show', app()->getLocale());
    }
}
