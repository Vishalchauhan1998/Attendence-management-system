<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('stud_id');
            $table->integer('dept_id')->unsigned();
            $table->integer('sem_id')->unsigned();
            $table->integer('e_no');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->string('address');
            $table->string('dob');
            $table->string('gender');
            $table->string('blood_group');
            $table->string('year_admission');
            $table->string('stud_phone');
            $table->string('par_phone');
            $table->string('email');
            $table->string('profile');
            $table->foreign('dept_id')->references('dept_id')->on('departments');
            $table->foreign('sem_id')->references('sem_id')->on('semesters');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
