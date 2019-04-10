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

Route::get('/', [
    'as' => 'home',
    'uses' => 'UserController@index'
]);

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

Route::get('/login', [
    'as' => 'login',
    'uses' => 'UserController@showLogin'
]);

Route::post('/auth/login', [
   'as' => 'user.signin',
   'uses' => 'UserController@signUserIn'
]);

Route::get('/auth/register', [
    'as' => 'register',
    'uses' => 'UserController@showRegister'
]);

Route::get('/register', [
    'as' => 'register',
    'uses' => 'UserController@showRegister'
]);

Route::post('/auth/register', [
    'as' => 'user.signup',
    'uses' => 'UserController@createUser'
]);

Route::get('/admin/login', [
    'as' => 'admin.login',
    'uses' => 'AdminController@showAdminLogin'
]);

Route::post('/admin/login', [
    'as' => 'admin.signin',
    'uses' => 'AdminController@adminLogin'
]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'UserController@destroy'
]);

Route::get('/admin/semesters/create', [
   'as' => 'semester.create' ,
    'uses' => 'SemesterController@create'
]);
Route::post('/admin/semesters/create', [
    'as' => 'semester.save' ,
    'uses' => 'SemesterController@store'
]);

Route::get('/admin/history', [
    'as' => 'admin.history' ,
    'uses' => 'AdminController@history'
]);

Route::get('/admin/semesters/{id}/edit', [
    'as' => 'semester.edit' ,
    'uses' => 'SemesterController@edit'
]);
Route::post('/admin/semesters/{id}/edit', [
    'as' => 'semester.update' ,
    'uses' => 'SemesterController@update'
]);

Route::get('/students', [
    'as' => 'students.home',
    'uses' => 'StudentController@index'
]);

Route::get('/history', [
    'as' => 'students.history',
    'uses' => 'StudentController@history'
]);

Route::post('/students', [
    'as' => 'students.report',
    'uses' => 'StudentController@store'
]);

Route::post('/admin/semesters/{id}/delete', [
   'as' => 'semester.delete',
   'uses' => 'SemesterController@destroy'
]);

Route::get('/password-reset', [
    'as' => 'password.reset',
    'uses' => 'UserController@showReset'
]);

Route::post('/password-reset', [
    'as' => 'password.submit',
    'uses' => 'UserController@reset'
]);