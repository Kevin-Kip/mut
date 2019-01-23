<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signUserIn(Request $request) {
        $this->validate($request,[
            'email' => 'required|max:30|min:5',
            'password'=>'required|min:6|max:12'
        ], [
            'email.required' => "Email is required",
            'email.min' => "Email is too short",
            'email.max' => "Email should not exceed 30 characters",
            'password.required' => "Password is required",
            'password.min' => "Password should be at least 6 characters",
            'password.max' => "Password cannot exceed 12 characters"
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = Auth::user();
        }
    }
}
