<?php

namespace App\Http\Controllers;

use App\Semester;
use App\Student;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Session::get('user');
        $student = Student::where('email',$user->email)->first();
        $semester = Semester::where(['program' => $student->program, 'status' => 0])->first();
        $transcript = DB::table('transcripts')->orderBy('created_at', 'desc')->get();
        $submission = Submission::where(['student'=>$student->student_id, 'semester'=>$semester->semester_id])->first();
        return view('student.dashboard')->with(['submission'=>$submission, 'student'=>$student, 'semester'=>$semester, 'transcript'=>$transcript]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $submission = Submission::where(['student'=>$request['student'], 'semester'=>$request['semester']])->first();
        if ($submission == null){
            $s = Submission::create([
                'student' => $request['student'],
                'semester' => $request['semester']
            ]);
            if ($s){
                
            }
        }
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
