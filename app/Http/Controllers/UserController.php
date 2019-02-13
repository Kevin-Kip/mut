<?php

namespace App\Http\Controllers;

use App\Semester;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            $user = User::where('email','=',$user->email)->first();
            Session::put('user',$user);
            if ($user->role == "Admin"){
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('students.home');
            }
        }
    }

    public function showRegister() {
        return view('auth.register');
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createUser(Request $request) {
        $this->validate($request, [
            'email' => 'required|max:30|min:5',
            'password'=>'required|min:6|max:12',
            'registration' => 'required|min:15|max:16'
        ],[
            'email.required' => "Email is required",
            'email.min' => "Email is too short",
            'email.max' => "Email should not exceed 30 characters",
            'password.required' => "Password is required",
            'password.min' => "Password should be at least 6 characters",
            'password.max' => "Password cannot exceed 12 characters",
            'registration.min' => "Registration number should be at least 15 characters",
            'registration.max' => "Registration number should not exceed 16 characters"
        ]);

        $name = $request['first_name']." ".$request['last_name'];
        $email = $request['email'];
        $password = $request['password'];

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => "Student"
        ]);

        $student = Student::create([
            'name' => $name,
            'registration' => $request['registration'],
            'program' => $request['program'],
            'email' => $email
        ]);

        if ($student){
            $semesters = Semester::all();
            return redirect()->route('students.home', compact('semesters'));
        }
        return $request->all();
    }

    public function destroy() {
        Auth::logout();
        Session::forget('user');
        return redirect()->route('user.signin');
    }
}
