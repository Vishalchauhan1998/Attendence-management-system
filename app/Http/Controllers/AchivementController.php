<?php

namespace App\Http\Controllers;
use App\Department;
use App\Faculty;
use App\Achivement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchivementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	/*public function __construct()
    {
        $this->middleware('auth:Admin');
    }*/

    public function index()
    {
        $achivements = DB::table('achivements')
                    ->join('departments','departments.dept_id','=','achivements.dept_id')
                    ->join('facultys','facultys.f_id','=','achivements.f_id')
                    ->select('achivements.*','departments.*','facultys.*')
                    ->get();
        return view('view_achivement',compact('achivements'));
    }

	public function showForm()
    {
        $departments = Department::all();
        $facultys = Faculty::all();
        $achivements = Achivement::all();
        return view('add_achivement',compact('departments','facultys','achivements'));
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
		$achivements = new Achivement();
        $achivements->dept_id = request('dept_id');
        $achivements->f_id = request('f_id');
        $achivements ->Activty_Type = request('Activtytype');
        $achivements ->Add_Details = request('details');
        $achivements ->save();
		
		return redirect('achivement');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function show( $Achivement_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function edit($Achivement_id)
    {
        $findachivement = Achivement::find($Achivement_id);
        $departments = Department::all();
		$facultys = Faculty::all();
		return view('edit_achivement',['findachivement' => $findachivement,'facultys' => $facultys ,'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Achivement_id)
    {
        $achivement = Achivement::find($Achivement_id);
        $achivement->dept_id = request('dept_id');
        $achivement->f_id = request('f_id');
        $achivement ->Activty_Type = request('Activtytype');
        $achivement ->Add_Details = request('details');
        $achivement->save();
        
        return redirect('faculty');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $Achivement_id)
    {
        $achivement = Achivement::find($Achivement_id);
        $achivement->delete();
        session()->flash('message','Deleted Successfully');
        return redirect('/achivement');
    }

    public function getfaculty(Request $request)
    {
       return $facultys = DB::table("facultys")
                    ->where("dept_id",$request->dept_id)
                    ->pluck("fname","f_id");
        return response()->json($facultys);
    }
}
