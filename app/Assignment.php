<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';
    public $timestamps = True;
	public $primaryKey = 'assi_id';
}
