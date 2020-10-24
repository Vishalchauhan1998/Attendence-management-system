<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';
    public $timestamps = True;
	public $primaryKey = 'sem_id';
}
