<?php

namespace App\Http\Controllers;

use App\Program;
use App\Semester;
use App\Student;
use App\Transcript;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = Session::get('user');
        if ($user == null) return redirect()->route('login');
        else {
            if ($user->role == "Student") return redirect()->route('students.home');
            else if ($user->role == "Admin") return redirect()->route('admin.home');
        }
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signUserIn(Request $request)
    {
        $this->validate($request, [
            'reg_no' => 'required|regex:([a-zA-Z]{2}\s*[0-9]{3}/[0-9]{4}/[0-9]{4})',
            'password' => 'required|min:6|max:12'
        ], [
            'reg_no.required' => "Field is required",
            'reg_no.regex' => "Please match the format SC 212/0736/2015",
            'password.required' => "Password is required",
            'password.min' => "Password should be at least 6 characters",
            'password.max' => "Password cannot exceed 12 characters"
        ]);

        $reg = $request['reg_no'];
        $user = Student::where('registration', $reg)->first();
        $email = $user->email;

        if (Auth::attempt(['email' => $email, 'password' => $request['password']])) {
            $user = Auth::user();
            $user = User::where('email', '=', $user->email)->first();
            Session::put('user', $user);
            if ($user->role == "Admin") {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('students.home');
            }
        }
    }

    public function showRegister()
    {
        $programs = Program::all();
        return view('auth.register')->with(["programs" => $programs]);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:30|min:5',
            'password' => 'required|min:6|max:12',
            'registration' => 'required|regex:([a-zA-Z]{2}\s*[0-9]{3}/[0-9]{4}/[0-9]{4})'
        ], [
            'email.required' => "Email is required",
            'email.min' => "Email is too short",
            'email.max' => "Email should not exceed 30 characters",
            'password.required' => "Password is required",
            'password.min' => "Password should be at least 6 characters",
            'password.max' => "Password cannot exceed 12 characters",
            'registration.regex' => "Please match the format SC 212/0736/2015"
        ]);

        $name = $request['first_name'] . " " . $request['last_name'];
        $email = $request['email'];
        $password = $request['password'];

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => "Student"
        ]);
        Session::put('user', $user);

        $student = Student::create([
            'name' => $name,
            'registration' => $request['registration'],
            'program' => $request['program'],
            'email' => $email,
            'fee_balance' => 12,
            'student_category' => $request['student_category']
        ]);

        if ($student) {
            $semesters = Semester::all();
            return redirect()->route('students.home', compact('semesters'));
        }
        return $request->all();
    }

    public function destroy()
    {
        Auth::logout();
        Session::forget('user');
        return redirect()->route('user.signin');
    }

    public function showReset()
    {
        return view('auth.password-reset');
    }

    public function reset(Request $request)
    {
        $email = $request['email'];
//        Mail::send([
//            'to' => $email,
//            'from' => 'admin@system.com',
//            'subject' => "Password Reset",
//            'body' => ""]);

        $message = "Email has been sent to " . $email;
        return redirect()->back()->with(['message', $message]);
    }
}
