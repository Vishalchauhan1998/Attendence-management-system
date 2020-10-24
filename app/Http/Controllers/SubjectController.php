<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Semester;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = DB::table('subjects')
                ->join('departments','departments.dept_id', '=','subjects.dept_id')
                ->join('semesters','semesters.sem_id','=','subjects.sem_id')
                ->select('subjects.*','departments.*','semesters.*')
                ->get();
            return view('view_subject',compact('subjects'));
        
    }
    public function showForm()
    {
        $departments = Department::all();
		$semesters = Semester::all();
        return view('add_subject',compact('departments','semesters'));
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
        $subjects = new Subject();
        $subjects->dept_id = request('department');
		$subjects->sem_id = request('semester');
		$subjects ->sub_name = request('sub_name');
        $subjects ->sub_code = request('sub_code');
        $subjects->save();
		return redirect('view_subject');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($sub_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($sub_id)
    {
        $findsub = Subject::find($sub_id);
        $departments = Department::all();
        $semesters = Semester::all();
		return view('edit_subject',['findsub' => $findsub, 'departments' => $departments,'semesters' => $semesters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sub_id)
    {
        $subjects = Subject::find($sub_id);
        $subjects->dept_id = request('department');
        $subjects->sem_id = request('semester');
		$subjects ->sub_name = request('sub_name');
        $subjects ->sub_code = request('sub_code');
        $subjects->save();
		return redirect('view_subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($sub_id)
    {
        $subject = Subject::find($sub_id);
        $subject->delete();
		session()->flash('message','Deleted Successfully');
		return redirect('/view_subject');
    }

    public function getdepartment(Request $request)
    {
       return $semesters = DB::table("semesters")
                    ->where("dept_id",$request->dept_id)
                    ->pluck("sem_name","sem_id");
        return response()->json($semesters);
    }

}
