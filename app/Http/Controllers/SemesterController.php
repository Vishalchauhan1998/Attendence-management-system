<?php

namespace App\Http\Controllers;

use App\Department;
use App\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $semesters =Semester ::join('departments', 'semesters.dept_id', '=', 'departments.dept_id')
                 ->select('semesters.*', 'departments.depart_short_name as depart_short_name')
                 ->get();
        return view('view_semester',compact('semesters'));
    }
    public function showForm()
    {
        $departments = Department::all();
        return view('add_semester',compact('departments'));
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
        $semester = new Semester();
		$semester->dept_id = request('dept_id');
        $semester->sem_name = request('sem_name');
		$semester->save();

        return redirect('view_semester');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show($sem_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit($sem_id)
    {
        $findsem = Semester::find($sem_id);
		$departments = Department::all();
		return view('edit_semester',['findsem' => $findsem,'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$sem_id)
    {
        $semesters = Semester::find($sem_id);
		$semesters->dept_id = request('dept_id');
        $semesters->sem_name = request('sem_name');
        $semesters->save();
        return redirect('view_semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($sem_id)
    {
        $semester = Semester::find($sem_id);
		$semester->delete();
		return redirect('/view_semester');
    }
}
