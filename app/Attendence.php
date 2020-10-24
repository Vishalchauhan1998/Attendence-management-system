<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $table = 'attendences';
    public $timestamps = True;
	public $primaryKey = 'atte_id';
}
