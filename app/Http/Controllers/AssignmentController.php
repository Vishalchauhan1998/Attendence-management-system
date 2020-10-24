<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Department;
use App\Semester;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = DB::table('assignments')
                        ->join('departments','departments.dept_id', '=','assignments.dept_id')
                        ->join('semesters','semesters.sem_id','=','assignments.sem_id')
                        ->join('subjects','subjects.sub_id','=','assignments.sub_id')
                        ->select('assignments.*','departments.*','semesters.*','subjects.*')
                        ->get();
        return view('view_assignment',compact('assignments'));
      }
     public function showForm()
     {
        $departments = Department::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        return view('add_assignment',compact('departments','semesters','subjects'));
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
        $assignments = new Assignment();
        $assignments->dept_id = request('department');
        $assignments->sem_id = request('semester');
        $assignments->sub_id = request('subject');
        $assignments->class = request('class');
		$assignments ->assi_name = request('assi_name');
		if($img=$request->file('file'))
           {
               $x= $img->getClientOriginalExtension();
               $valid=["jpg","png","jpeg","xlxs","docx","pdf"];
               if(!in_array($x,$valid))
               {
                   dd("Please Select File and Image");
               }
               else
               {
                $name=time().".".$x;
                $dbpath='files';
                $img->move(public_path($dbpath),$name);
                $assignments->file=$dbpath."/".$name;
               }
           }
        $assignments->save();
		return redirect('view_assignment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show($assi_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit($assi_id)
    {
        $findassi = Assignment::find($assi_id);
		$departments = Department::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
		return view('edit_assignment',['findassi' => $findassi, 'departments' => $departments,'subjects' => $subjects,'semesters' => $semesters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $assi_id)
    {
        $assignments = Assignment::find($assi_id);
        $assignments->dept_id = request('department');
        $assignments->sem_id = request('semester');
        $assignments->sub_id = request('subject');
        $assignments->class = request('class');
		$assignments ->assi_name = request('assi_name');
		if($img=$request->file('file'))
           {
               $x= $img->getClientOriginalExtension();
               $valid=["jpg","png","jpeg","xlxs","docx","pdf"];
               if(!in_array($x,$valid))
               {
                   dd("Please Select File and Image");
               }
               else
               {
                $name=time().".".$x;
                $dbpath='files';
                $img->move(public_path($dbpath),$name);
                $assignments->file=$dbpath."/".$name;
               }
           }
        $assignments->save();
		return redirect('view_assignment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($assi_id)
    {
        $assignments = Assignment::find($assi_id);
        $assignments->delete();
		session()->flash('message','Deleted Successfully');
		return redirect('/view_assignment');
    }

    public function getdepartment(Request $request)
    {
       return $semesters = DB::table("semesters")
                    ->where("dept_id",$request->dept_id)
                    ->pluck("sem_name","sem_id");
        return response()->json($semesters);
    }

}
