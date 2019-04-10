<?php

namespace App\Http\Controllers;

use App\Semester;
use App\Submission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeSems = Semester::where('status','=',0)->count();
        $semesters = DB::table('semesters')->take(3)->get();
//        return $semesters;
        return view('admin.dashboard')->with(['activeSems' => $activeSems, 'semesters' => $semesters]);
    }

    public function showAdminLogin() {
        return view('admin.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function adminLogin(Request $request) {
        $this->validate($request,[
            'email' => 'required|max:30|min:5',
            'password'=>'required|min:6|max:12'
        ], [
            'email.required' => "Field is required",
            'email.min' => "Email is too short",
            'email.max' => "Email should not exceed 30 characters",
            'password.required' => "Password is required",
            'password.min' => "Password should be at least 6 characters",
            'password.max' => "Password cannot exceed 12 characters"
        ]);

        $email = $request['email'];

        if (Auth::attempt(['email' => $email, 'password' => $request['password']])) {
            $user = Auth::user();
            $user = User::where('email','=',$user->email)->first();
            Session::put('user',$user);
            if ($user->role == "Admin"){
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('login');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function semesters()
    {
        $semesters = DB::table('semesters')->paginate(10);
        return view('admin.semesters')->with(['semesters'=>$semesters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $submissions = DB::table('semesters')
            ->orderBy('semester_id', 'desc')
            ->leftJoin('submissions', 'semester_id', '=', 'submissions.semester')
            ->get();
        return view('admin.students')->with(['semesters'=>$submissions]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
