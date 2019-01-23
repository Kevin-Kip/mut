<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/semesters', [
    'as' => 'admin.semesters',
    'uses' => 'AdminController@index'
]);

Route::get('/auth/login', [
   'as' => 'login',
    'uses' => 'UserController@showLogin'
]);

Route::post('/auth/login', [
   'as' => 'user.signin',
   'uses' => 'UserController@signUserIn'
]);