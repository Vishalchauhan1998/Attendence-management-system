<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {
            $table->increments('atte_id');
            $table->integer('stud_id')->unsigned();
            $table->integer('dept_id')->unsigned();
            $table->integer('sem_id')->unsigned();
            $table->integer('sub_id')->unsigned();
            $table->string('slot');
            $table->string('date');
            $table->string('class');
            $table->boolean('attendence');
            $table->foreign('dept_id')->references('dept_id')->on('departments');
            $table->foreign('stud_id')->references('stud_id')->on('students');
            $table->foreign('sem_id')->references('sem_id')->on('semesters');
            $table->foreign('sub_id')->references('sub_id')->on('subjects');
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
        Schema::dropIfExists('attendences');
    }
}
