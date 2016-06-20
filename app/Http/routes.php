<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');

Route::get('/', [
   'uses' => 'UserController@welcomeRoute',
    'as' => 'welcome'
]);

Route::post('/register', [
    'uses' => 'UserController@registerUser',
    'as' => 'register.user'
]);

Route::get('/home', [
    'uses' => 'UserController@homeRoute',
    'as' => 'home',
    'middleware' => 'auth'
]);

Route::get('/logout', [
    'uses' => 'UserController@logOut',
    'as' => 'logout'
]);

Route::post('/userlogin', [
    'uses' => 'UserController@logIn',
    'as' => 'login.user'
]);

Route::get('/login', function(){
    return view('authentication.login');
})->name('login');