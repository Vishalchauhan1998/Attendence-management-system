<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'facultys';
    public $timestamps = True;
	public $primaryKey = 'f_id';
}
