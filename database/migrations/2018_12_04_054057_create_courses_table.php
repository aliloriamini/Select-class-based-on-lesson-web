<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('college_name');
            $table->string('group_name');
            $table->string('course_type');
            $table->string('section'); //مقطع تحصیلی
            $table->string('term');
            $table->integer('stu_number');
            $table->integer('theoretical');
            $table->integer('artificial');
            $table->integer('coefficient_thr');
            $table->integer('coefficient_art');
            $table->integer('hour_thr');
            $table->integer('hour_art');
            $table->integer('course_day');
            $table->integer('day_rep');
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
        Schema::dropIfExists('courses');
    }
}
