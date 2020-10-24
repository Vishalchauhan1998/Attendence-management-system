<?php

namespace App\Http\Controllers;

use App\Student;
use App\Department;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // $students = Student::join('departments', 'students.dept_id', '=', 'departments.dept_id')
        //          ->select('students.*','departments.depart_short_name as depart_short_name')
        //          ->get();

        $students = DB::table('students')
        ->join('departments','departments.dept_id', '=','students.dept_id')
        ->join('semesters','semesters.sem_id','=','students.sem_id')
        ->select('students.*','departments.*','semesters.*')
        ->get();
           
		return view('view_student',compact('students'));
    }
    public function showForm()
    {
		$departments = Department::all();
        return view('add_student',compact('departments'));
    }
    public function showForm_all()
    {
		$departments = Department::all();
        return view('add_all_student',compact('departments'));
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
        $students = new Student();
        $students->dept_id = request('depart');
        $students ->sem_id = request('semester');
        $students ->e_no = request('e_no');
        $students ->f_name = request('f_name');
        $students ->m_name = request('m_name');
		$students ->l_name = request('l_name');
		$students ->address = request('address');
		$students ->dob = request('dob');
		$students ->gender = request('gender');
        $students ->blood_group = request('blood_group');
        $students ->year_admission = request('year_admission');
        $students ->stud_phone = request('stud_phone');
        $students ->par_phone = request('par_phone');
		$students ->email = request('email');
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
                $students->profile=$dbpath."/".$name;
               }
           }
        $students->save();
		return redirect('view_student');
    }

    public function store_all(Request $request)
    {
        $error_msg = "";
        if($_FILES['file']['name']){
            $arrFileName = explode('.',$_FILES['file']['name']);
            if($arrFileName[1] == 'csv'){
                $handle = fopen($_FILES['file']['tmp_name'], "r");
                $row = 0;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $row++;
                    if($row == 1){
                        continue;
                    }

                    $e_no=$data[0];
                    $f_name=$data[1];
                    $m_name=$data[2];
                    $l_name=$data[3];
                    $address=$data[4];
                    $dob=$data[5];
                    $gender=$data[6];
                    $blood_group=$data[7];
                    $year_admission=$data[8];
                    $stud_phone=$data[9];
                    $par_phone=$data[10];
                    $semester=$data[11];
                    $email=$data[12];
                    $profile=$data[13];
                    
                    if(!$e_no || !$f_name || !$m_name || !$l_name || !$address || !$dob || !$gender || !$blood_group || !$year_admission || !$stud_phone || !$par_phone || !$email || !$profile){
                        $error_msg .= "some data missing in row ". ($row-1) . " ,";
                        continue;
                    }

                    $student = new Student();
                    $student->dept_id = request('depart');
                    $student->sem_id = request('semester');                
                    $student->e_no = $e_no;
                    $student->f_name = $f_name;
                    $student->m_name = $m_name;
                    $student->l_name = $l_name;
                    $student->address = $address;
                    $student->dob = $dob;
                    $student->gender = $gender;
                    $student->blood_group = $blood_group;
                    $student->year_admission = $year_admission;
                    $student->stud_phone = $stud_phone;
                    $student->par_phone = $par_phone;
                    $student->email = $email;
                    $student->profile = $profile;
                    try{
                        $student->save();
                    }catch (\Illuminate\Database\QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        if($errorCode == 1062){
                            continue;
                        }
                        throw $e;
                    }
                }
                fclose($handle);
                if($error_msg){
                    $error_msg .= "except this other student recored was saved.";
                    return redirect()->back()->with('error_msg', $error_msg);
                }
            }
            else{
                $error_msg = "file format must be .csv";
                return redirect()->back()->with('error_msg', $error_msg);
            }
        }
        else{
            $error_msg = "please upload csv file";
            return redirect()->back()->with('error_msg', $error_msg);
        }
		return redirect('view_student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($stud_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($stud_id)
    {
        $findstud = Student::find($stud_id);
        $departments = Department::all();
        $semesters = Semester::all();
		 return view('edit_student',['findstud' => $findstud, 'departments' => $departments, 'semesters' => $semesters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$stud_id)
    {
        $students = Student::find($stud_id);
        $students->dept_id = request('department');
        $students ->sem_id = request('semester');
        $students ->e_no = request('e_no');
        $students ->f_name = request('f_name');
        $students ->m_name = request('m_name');
		$students ->l_name = request('l_name');
		$students ->address = request('address');
		$students ->dob = request('dob');
		$students ->gender = request('gender');
        $students ->blood_group = request('blood_group');
        $students ->year_admission = request('year_admission');
        $students ->stud_phone = request('stud_phone');
        $students ->par_phone = request('par_phone');
		
		$students ->email = request('email');
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
                $students->profile=$dbpath."/".$name;
               }
           }
        $students->save();
		return redirect('view_student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($stud_id)
    {
        $students = Student::find($stud_id);
        $students->delete();
		session()->flash('message','Deleted Successfully');
		return redirect('/view_student');
    }
    public function showdetail($stud_id)
	{
		$findstud = DB::table('students')
        ->join('departments','departments.dept_id','=','students.dept_id')
        ->join('semesters','semesters.sem_id','=','students.sem_id')
		->select('students.*','departments.*','semesters.*')
		->where('students.stud_id','=',$stud_id)
		->get();
		return view('view_student_detail',['findstud' => $findstud ]);
    }
    
    public function getdepartment(Request $request)
    {
       return $semesters = DB::table("semesters")
                    ->where("dept_id",$request->dept_id)
                    ->pluck("sem_name","sem_id");
        return response()->json($semesters);
    }
}
