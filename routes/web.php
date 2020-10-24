<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/report1', function () {
    session_start();
    $students = unserialize($_SESSION['report_data']);
    return view('print',compact('students'));
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $a="500";
    $b="3300";
    return view('dashboard')->with("a",$a)->with("b",$b);
    return view('dashboard');
});


Auth::routes();

Route::get('/add_department','DepartmentController@showForm');
Route::post('/depart','DepartmentController@store');
Route::get('/view_department','DepartmentController@index');
Route::get('/{dept_id}/editdepartment','DepartmentController@edit');
Route::put('/updatedept/{dept_id}','DepartmentController@update');
Route::get('/{dept_id}/deldepartment','DepartmentController@destroy');

Route::get('/add_faculty','FacultyController@showForm');
Route::post('/store','FacultyController@store');
Route::get('/view_faculty','FacultyController@index');
Route::get('/{f_id}/editfaculty','FacultyController@edit');
Route::put('/updatefact/{f_id}','FacultyController@update');
Route::get('/{f_id}/delfaculty','FacultyController@destroy');
Route::get('/view_faculty_profile/{f_id}/','FacultyController@showdetail');

Route::get('/add_achivement','AchivementController@showForm');
Route::post('/achive','AchivementController@store');
Route::get('/view_achivement','AchivementController@index');
Route::get('/{Achivement_id}/editachivement','AchivementController@edit');
Route::put('/updateachive/{Achivement_id}','AchivementController@update');
Route::get('/{Achivement_id}/delachivement','AchivementController@destroy');
Route::get('/getfaculty','AchivementController@getfaculty');

Route::get('/add_student','StudentController@showForm');
Route::post('/stud','StudentController@store');
Route::get('/view_student','StudentController@index');
Route::get('/{stud_id}/editstudent','StudentController@edit');
Route::put('/updatestud/{stud_id}','StudentController@update');
Route::get('/{stud_id}/delstudent','StudentController@destroy');
Route::get('/view_student_detail/{stud_id}/','StudentController@showdetail');
Route::get('/add_all_student','StudentController@showForm_all');
Route::post('/stud_all','StudentController@store_all');

Route::get('/add_attendence','AttendenceController@showForm');
Route::post('/atten','AttendenceController@store');
Route::get('/view_attendence','AttendenceController@index');
Route::get('/{atte_id}/editattendence','AttendenceController@edit');
Route::put('/updateatte/{atte_id}','AttendenceController@update');
Route::get('/{atte_id}/delattendence','AttendenceController@destroy');
Route::get('/getdepartment','AttendenceController@getdepartment');
Route::get('/getsemester','AttendenceController@getsemester'); 
Route::get('/getstudent','AttendenceController@getstudent'); 

Route::match(['get', 'post'], '/report','AttendenceController@showReport');
Route::match(['get', 'post'], '/all_absent','AttendenceController@all_absent');
// Route::get('/getall_absent','AttendenceController@getall_absent'); 



Route::get('/add_semester','SemesterController@showForm');
Route::post('/sem','SemesterController@store');
Route::get('/view_semester','SemesterController@index');
Route::get('/{sem_id}/editsemester','SemesterController@edit');
Route::put('/updatesem/{sem_id}','SemesterController@update');
Route::get('/{sem_id}/delsemester','SemesterController@destroy');

Route::get('/add_subject','SubjectController@showForm');
Route::post('/sub','SubjectController@store');
Route::get('/view_subject','SubjectController@index');
Route::get('/{sub_id}/editsubject','SubjectController@edit');
Route::put('/updatesub/{sub_id}','SubjectController@update');
Route::get('/{sub_id}/delsubject','SubjectController@destroy');
Route::get('/getdepartment','SubjectController@getdepartment');


Route::get('/add_assignment','AssignmentController@showForm');
Route::post('/assi','AssignmentController@store');
Route::get('/view_assignment','AssignmentController@index');
Route::get('/{assi_id}/editassignment','AssignmentController@edit');
Route::put('/updateassi/{assi_id}','AssignmentController@update');
Route::get('/{assi_id}/delassignment','AssignmentController@destroy');
Route::get('/getdepartment','AssignmentController@getdepartment');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testsms', 'AttendenceController@testsms');



