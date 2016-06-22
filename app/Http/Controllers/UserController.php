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

        Auth::user()->logged_in = true;
        Auth::user()->update();

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
            Auth::user()->logged_in = true;
            Auth::user()->update();
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function logOut(Request $request)
    {
        Auth::user()->logged_in = false;
        Auth::user()->update();
        Auth::logout();

        return redirect()->route('welcome');
    }

    public function isLoggedIn(Request $request)
    {
        $users = User::all();

        $responseData = [];

        foreach($users as $user) {

            array_push($responseData, ['user_id' => $user->id, 'logged_in' => $user->logged_in]);

        }

        return response()->json($responseData, 200);

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
