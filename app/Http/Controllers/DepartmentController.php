<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('view_department',compact('departments'));
    }
	public function showForm()
    {
        return view('add_department');
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
        $dept = new Department;
		$dept->depart_short_name = request('shortdept');
		$dept->depart_full_name = request('fulldept');
		$dept->save();
		return redirect('view_department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show( $dept_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($dept_id)
    {
		 $finddept = Department::find($dept_id);
		 return view('edit_department',['finddept' => $finddept]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dept_id)
    {
        $dept = Department::find($dept_id);
		$dept->depart_short_name = request('shortdept');
		$dept->depart_full_name = request('fulldept');
		$dept->save();
		return redirect('view_department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($dept_id)
    {
		$dept = Department::find($dept_id);
		$dept->delete();
		return redirect('view_department');
    }

    public function dept($dept_id) {
        $departments = Departement::count();
        return view('dashboard', compact('departments'));
    }
}
