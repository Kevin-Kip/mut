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

Route::get('/admin', [
    'as' => 'admin.home',
    'uses' => 'AdminController@index'
]);

Route::get('/admin/semesters', [
    'as' => 'admin.semesters',
    'uses' => 'AdminController@semesters'
]);

Route::get('/auth/login', [
   'as' => 'login',
    'uses' => 'UserController@showLogin'
]);

Route::post('/auth/login', [
   'as' => 'user.signin',
   'uses' => 'UserController@signUserIn'
]);

Route::get('/admin/semesters/create', [
   'as' => 'semester.create' ,
    'uses' => 'SemesterController@create'
]);
Route::post('/admin/semesters/create', [
    'as' => 'semester.save' ,
    'uses' => 'SemesterController@store'
]);