<?php

namespace App\Http\Controllers;
use App\Department;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $facultys = Faculty::join('departments', 'facultys.dept_id', '=', 'departments.dept_id')
                 ->select('facultys.*','departments.depart_short_name as depart_short_name')
                 ->get();
		return view('view_faculty',compact('facultys'));
     }
    public function showForm()
    {
		$departments = Department::all();
        return view('add_faculty',compact('departments'));
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
        $facultys = new Faculty();
		$facultys->dept_id = request('depart');
		$facultys ->fname = request('fname');
		$facultys ->lname = request('lname');
		$facultys ->Qualification = request('Qualification');
		$facultys ->dob = request('dob');
		$facultys ->gender = request('gender');
		$facultys ->position = request('position');
		$facultys ->phone = request('phone');
		$facultys ->email = request('email');
		$facultys ->area_interest = request('area');
		$facultys ->exprience = request('exprience');
		if($img=$request->file('file'))
           {
               $x= $img->getClientOriginalExtension();
               $valid=["jpg","png","jpeg"];
               if(!in_array($x,$valid))
               {
                   dd("Please Select Only Image");
               }
               else
               {
                $name=time().".".$x;
                $dbpath='images';
                $img->move(public_path($dbpath),$name);
                $facultys->proflie=$dbpath."/".$name;
               }
           }
        $facultys->save();
		return redirect('view_faculty');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show($f_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($f_id)
    {
        $findfact = Faculty::find($f_id);
		$departments = Department::all();
		return view('edit_faculty',['findfact' => $findfact, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $f_id)
    {
        $faculty = Faculty::find($f_id);
		$faculty->dept_id = request('depart');
		$faculty ->fname = request('fname');
		$faculty ->lname = request('lname');
		$faculty ->Qualification = request('Qualification');
		$faculty ->dob = request('dob');
		$faculty ->gender = request('gender');
		$faculty ->position = request('position');
		$faculty ->phone = request('phone');
		$faculty ->email = request('email');
		$faculty ->area_interest = request('area');
		$faculty ->exprience = request('exprience');
		if($img=$request->file('file'))
           {
               $x= $img->getClientOriginalExtension();
               $valid=["jpg","png","jpeg"];
               if(!in_array($x,$valid))
               {
                   dd("Please Select Only Image");
               }
               else
               {
                $name=time().".".$x;
                $dbpath='images';
                $img->move(public_path($dbpath),$name);
                $faculty->proflie=$dbpath."/".$name;
               }
           }
        $faculty->save();
		return redirect('view_faculty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($f_id)
    {
        $faculty = Faculty::find($f_id);
        $faculty->delete();
		session()->flash('message','Deleted Successfully');
		return redirect('/view_faculty');
    }
	public function showdetail($f_id)
	{
		$findfact = DB::table('facultys')
		->join('departments','departments.dept_id','=','facultys.dept_id')
		->select('facultys.*','departments.depart_full_name')
		->where('facultys.f_id','=',$f_id)
        ->get();
		$findachivement = DB::table('achivements')
		->select('achivements.*')
		->where('achivements.f_id','=',$f_id)
        ->get();

        return view('view_faculty_detail',['findfact' => $findfact[0], 'findachivement' => $findachivement ]);
	}
}
