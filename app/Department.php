<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments'; 
    public $timestamps = True;
	public $primaryKey = 'dept_id';
}
