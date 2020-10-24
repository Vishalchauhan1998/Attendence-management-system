<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('assi_id');
            $table->integer('dept_id')->unsigned();
            $table->integer('sem_id')->unsigned();
            $table->integer('sub_id')->unsigned();
            $table->string('assi_name');
            $table->string('class');
            $table->string('file');
            $table->foreign('dept_id')->references('dept_id')->on('departments');
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
        Schema::dropIfExists('assignments');
    }
}
