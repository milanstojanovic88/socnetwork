<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:20|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'password_confirm' => 'same:password|required'
        ]);

        $user = new User();
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->email = $request['email'];
        $user->full_name = $request['full_name'];

        $user->save();

        Auth::login($user);

        return redirect()->route('home');

    }

    public function logIn(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(
            [
                'username' => $request['username'],
                'password' => $request['password']
            ], $request['remember_me']
        )){
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function logOut(Request $request)
    {
        Auth::logout();

        return redirect()->route('welcome');
    }

    public function homeRoute()
    {
        return view('home');
    }

    public function welcomeRoute()
    {
        if(Auth::user()){
            return view('home');
        } else {
            return view('welcome');
        }
    }
}
