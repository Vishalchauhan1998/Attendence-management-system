<?php

namespace App\Http\Controllers;

use App\Attendence;
use App\Student;
use App\Department;
use App\Semester;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendences = DB::table('attendences')
                        ->join('departments','departments.dept_id', '=','attendences.dept_id')
                        ->join('semesters','semesters.sem_id','=','attendences.sem_id')
                        ->join('subjects','subjects.sub_id','=','attendences.sub_id')
                        ->join('students','students.stud_id','=','attendences.stud_id')
                        ->select('attendences.*','departments.*','semesters.*','subjects.*','students.*')
                        ->get();
        return view('view_attendence',compact('attendences'));

    }
    
    public function showForm()
    {
        $students = Student::all();
        $departments = Department::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        return view('add_attendence',compact('students','departments','semesters','subjects'));
    }

    public function showReport(Request $request)
    {
        $students = array();
        $departments = Department::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        if(request('submit')){
            // echo "SELECT  s.*,(attend.attend*100)/total.total as per, total.total , attend.attend FROM (SELECT count(*) as total from attendences WHERE sub_id=".request('subject')." and dept_id=".request('department')." AND sem_id=".request('semester').") as total, (SELECT stud_id, count(*) as attend FROM attendences WHERE sub_id=".request('subject')." and dept_id=".request('department')." AND sem_id=".request('semester')." AND attendence=1 GROUP BY stud_id) as attend, students s WHERE attend.stud_id=s.stud_id AND dept_id=".request('department')." AND sem_id=".request('semester')." AND (attend.attend*100)/total.total BETWEEN ".request('price-min')." AND ".request('price-max');
            // SELECT s.*,(attend.attend*100)/total.total as per, total.total , attend.attend FROM (SELECT count(*) as total from attendences WHERE sub_id=1 and dept_id=1 AND sem_id=2) as total, (SELECT stud_id, count(*) as attend FROM attendences WHERE sub_id=1 and dept_id=1 AND sem_id=2 AND attendence=1 GROUP BY stud_id ) as attend, students s WHERE attend.stud_id=s.stud_id AND dept_id=1 AND sem_id=2 AND (attend.attend*100)/total.total BETWEEN 0 AND 100
            $students = DB::select("SELECT  s.*,(attend.attend*100)/total.total as per, total.total , attend.attend FROM (SELECT count(*) as total from attendences WHERE sub_id=".request('subject')." and dept_id=".request('department')." AND sem_id=".request('semester').") as total, (SELECT stud_id, count(*) as attend FROM attendences WHERE sub_id=".request('subject')." and dept_id=".request('department')." AND sem_id=".request('semester')." AND attendence=1 GROUP BY stud_id) as attend, students s WHERE attend.stud_id=s.stud_id AND dept_id=".request('department')." AND sem_id=".request('semester')." AND (attend.attend*100)/total.total BETWEEN ".request('price-min')." AND ".request('price-max'));
            session_start();
            $_SESSION['report_data'] = serialize($students);
        }
        return view('report',compact('students','departments','semesters','subjects'));
    }

    public function all_absent(Request $request)
    {
        $students = array();
        $departments = Department::all();
        $semesters = Semester::all();
        $subjects = Subject::all();
        if(request('submit')){
            $students = DB::select("select * from students where sem_id=".request('semester'));
            foreach ($students as $stud) {
                $this->testsms($stud, 'all_absent_email');
                // Mail::send('email', ['name'=>"dhaval variya"], function($message) {
                //     $message->to([$stud->email], 'email ')->subject
                //        ('Attendence ');
                //  });
                //  return redirect('/view_attendence');
        
                // $sends="917990225852";
                // $msg="Dear Parents your ward participated in mass bunk in college which is not official.";
                // return $this->sendSMS($sends,$msg);
            }
             session()->flash('message','send Mail Successfully');
             return redirect('/view_attendence');

        }
        return view('all_absent',compact('students','departments','semesters','subjects'));
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
        $attendences_list = request('attendence');
        if($attendences_list){   
            foreach($attendences_list as $attendence){
                $attendences = new Attendence();
                $attendences->dept_id = request('department');
                $attendences->sem_id = request('semester');
                $attendences->sub_id = request('subject');
                $attendences->slot = request('slot');
                $attendences->date = date("d-m-Y", strtotime(request('date')));
                $attendences->class = request('class');
/*
SELECT dept_id, sem_id, sub_id, date, slot FROM `attendences` GROUP BY dept_id, sem_id, sub_id, slot, date ORDER by date DESC,slot DESC LIMIT 3

SELECT * FROM `attendences` WHERE stud_id=8 AND attendence=0 and ((date = '07-03-2020' AND slot=2) or (date = '08-03-2020' AND slot=1) or (date = '08-03-2020' AND slot=4))ORDER BY date DESC, slot DESC
*/
                $data = explode('_', $attendence);
                if($data[0] == "absent"){
                    $last_3_lecture = DB::select('SELECT dept_id, sem_id, sub_id, date, class, slot FROM `attendences` GROUP BY dept_id, sem_id, sub_id, slot, class, date ORDER by date DESC,slot DESC LIMIT 3');
                    if(count($last_3_lecture) == 3){
                        $lec_list = "";
                        foreach($last_3_lecture as $lec){
                            $lec_list .= "(date='". $lec->date ."' and slot=". $lec->slot .") or";
                        }
                        $lec_list = substr($lec_list, 0, strlen($lec_list) - 3); // remove last or from str
                        $stud_absent = DB::select("SELECT * FROM `attendences` WHERE stud_id=". $data[1] ." AND attendence=0 and (". $lec_list .") ORDER BY date DESC, slot DESC");
                        if(count($stud_absent) == 3){
                            $stud = DB::table("students")->where("stud_id",$data[1]);
                            $this->testsms($stud, '3day_email');
                        }
                    }
                }
                $attendences->attendence = ($data[0] == "present") ? 1 : 0;
                $attendences->stud_id = $data[1];
                $attendences-> save();
            }
        }
		return redirect('view_attendence');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show($atte_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit($atte_id)
    {
        $findatte = Attendence::find($atte_id);
        $departments = Department::all();
        $semesters = Semester::all();
        $students = Student::all();
        $subjects = Subject::all();
		return view('edit_attendence',['findatte' => $findatte, 'departments' => $departments,'semesters' => $semesters,'students'=>$students,'subjects'=>$subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $atte_id)
    {
        $attendence = Attendence::find($atte_id);
        $attendences->dept_id = request('department');
		$attendences ->stud_id = request('student');
        $attendences ->sem_id = request('semester');
        $attendences ->sub_id = request('subject');
        $attendences ->slot = request('slot');
        $attendences ->date = request('date');
        $attendences ->class = request('class');
        $attendences ->attendence = request('attendence');
        $attendences->save();
		return redirect('view_attendence');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy($atte_id)
    {
        $attendence = Attendences::find($atte_id);
        $attendence->delete();
		session()->flash('message','Deleted Successfully');
		return redirect('/view_attendence');
    }

    public function showdetail($atte_id)
	{
		$findatte = DB::table('attendences')
		->join('students','students.stud_id','=','attendences.stud_id')
		->select('attendences.*','students.eno')
		->where('attendences.atte_id','=',$atte_id)
        ->get();
        return view('view_attendence',['findatte' => $findatte[0]]);
    }

    public function getdepartment(Request $request)
    {
       return $semesters = DB::table("semesters")
                    ->where("dept_id",$request->dept_id)
                    ->pluck("sem_name","sem_id");
        return response()->json($semesters);
    }

    public function getsemester(Request $request)
    {
        return  $subjects = DB::table("subjects")
                    ->where("sem_id",$request->sem_id)
                    ->pluck("sub_name","sub_id");
        return response()->json($subjects);
    }

    public function getstudent(Request $request) 
	{
        $students = DB::table("students")
                    ->where("sem_id",$request->sem_id)
                    ->OrderBy('sem_id','ASC')
                    ->get();
		return response()->json($students);
    }

    public function testsms($stud, $template)
    {        
        Mail::send($template, ['name'=>$stud->f_name], function($message) use ($stud) {
            $message->to([$stud->email], 'email')->subject
               ('Laravel HTML Testing Mail');
         });
        
        $sends=$stud->par_phone;
        if ($template == 'all_absent_email') {
            $msg = 'all absent';
        }else{
            $msg="3 day absent";
        }
        // remove comment when need to send SMS
        // return $this->sendSMS($sends,$msg);
    }
    
    public static function sendSMS($sends,$msg)
    {
    $apiKey = urlencode('OtLoeGkFWh8-4h9fVGSzBF8uM1rzV1retOfvRKU67X');
	
	// Message details
	$numbers = urlencode($sends);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($msg);
 
	// Prepare data for POST request
	$data = 'apikey=' . $apiKey . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;
 
	// Send the GET request with cURL
	$ch = curl_init('https://api.textlocal.in/send/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	return $response;
    }

}
