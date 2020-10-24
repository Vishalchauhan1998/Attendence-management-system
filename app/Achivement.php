<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achivement extends Model
{
	protected $table = 'achivements'; 
    public $timestamps = true;
	public $primaryKey = 'Achivement_id';
}
