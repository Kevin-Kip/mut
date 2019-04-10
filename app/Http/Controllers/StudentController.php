<?php

namespace App\Http\Controllers;

use App\Semester;
use App\Student;
use App\Submission;
use function Composer\Autoload\includeFile;
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
        if ($user) $student = Student::where('email',$user->email)->first();
        else return redirect()->back();

        $semester = DB::table('semesters')
            ->where('program','=',$student->program)
            ->where('student_category', '=', $student->student_category)
            ->where('status','=', 0)
            ->first();

        $transcript = DB::table('transcripts')
            ->where('student', '=', $student->student_id)
            ->first();
        if($semester != null){
            $submission = Submission::where(['student'=>$student->student_id, 'semester'=>$semester->semester_id])->first();
        } else $submission = null;
        return view('student.dashboard')->with(['submission'=>$submission, 'student'=>$student, 'semester'=>$semester, 'transcript'=>$transcript]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $email = (Session::get('user'))->email;
        $student = Student::where('email', $email)->first();
        $submissions = DB::table('semesters')
            ->where('student', '=', $student->student_id)
            ->orderBy('semester_id', 'desc')
            ->leftJoin('submissions', 'semester_id', '=', 'submissions.semester')
            ->get();
        return view('student.history')->with(['semesters'=>$submissions]);
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
        return redirect()->back();
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
