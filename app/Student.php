<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'e_no','f_name','m_name','_name','address','dob','gender','blood_group','year_admission','stud_phone','per_phone','email','profile'
    ];
    protected $table = 'students';
    public $timestamps = True;
	public $primaryKey = 'stud_id';
}
 

