<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchivementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achivements', function (Blueprint $table) {
            $table->increments('Achivement_id');
            $table->integer('dept_id')->unsigned();
			$table->integer('f_id')->unsigned();
			$table->string('Activty_Type');
            $table->string('Add_Details');
            $table->foreign('dept_id')->references('dept_id')->on('departments');
			$table->foreign('f_id')->references('f_id')->on('facultys');
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
        Schema::dropIfExists('achivements');
    }
}
