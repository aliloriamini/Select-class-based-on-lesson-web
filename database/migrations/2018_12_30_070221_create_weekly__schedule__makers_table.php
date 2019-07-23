<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyScheduleMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly__schedule__makers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('course_id');
            $table->integer('professor_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('classroom_id');
            $table->integer('day');
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
        Schema::dropIfExists('weekly__schedule__makers');
    }
}

