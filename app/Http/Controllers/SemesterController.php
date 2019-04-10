<?php

namespace App\Http\Controllers;

use App\Program;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $startYear = date("Y");
        $endYear = $startYear + 1;
        $prevYear = $startYear - 1;
        $years1 = $prevYear."/".$startYear;
        $years2 = $startYear."/".$endYear;
        $years = array($years1, $years2);
        $programs = Program::all();
        return view('admin.create-semester')->with(['years' => $years, "programs" => $programs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fees' => 'max:6|min:5|'
        ],[
            'fees.max' => "Fees amounts should be less than 7 figures",
            'fees.min' => "Fees amounts too little"
        ]);
        $academic_year = $request['academic_year'];
        $fees = $request['fees'];
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $status = 0;
        $semester_no = $request['semester_no'];
        $program = $request['program'];
        $student_category = $request['student_category'];

        if ($start_date >= $end_date){
            return redirect()->back()->with(['message' => "date-error"]);
        } else {
            $existing = DB::table('semesters')
                ->where('program','=',$program)
                ->where('academic_year', '=', $academic_year)
                ->where('number', '=', $semester_no)
                ->where('student_category','=', $student_category)
                ->first();
            if ($existing){
                return redirect()->back()->with(['message' => "existing-error"]);
            }
            $semester = Semester::create([
                'academic_year' => $academic_year,
                'status' => $status,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'fees' => $fees,
                'number' => $semester_no,
                'program' => $program,
                'student_category' => $student_category
            ]);
            if ($semester){
                $result = "success";
            } else {
                $result = "error";
            }
        }
        return redirect()->back()->with(['message' => $result]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $startYear = date("Y");
        $endYear = $startYear + 1;
        $prevYear = $startYear - 1;
        $years1 = $prevYear."/".$startYear;
        $years2 = $startYear."/".$endYear;
        $years = array($years1, $years2);
        $semester = Semester::where('semester_id', $id)->first();
        $programs = Program::all();
        return view('admin.edit-semester')->with(["semester" => $semester, "years" => $years, "programs" => $programs]);
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
        $semester = Semester::where('semester_id', $id)->first();

        if ($semester->update($request->except('_token'))) $message = "success";
        else $message = "error";

        return redirect()->back()->with(["message" => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sem = Semester::where('semester_id', $id)->first();

        if ($sem->delete()) $message = "success";
        else $message = "error";

        return redirect()->back()->with('message',$message);
    }
}
