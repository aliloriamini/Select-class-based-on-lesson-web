<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_number');
            $table->integer('usage')->references('code')->on('usage');
            $table->integer('building');
            $table->integer('floor');
            $table->integer('chair_number');
            $table->integer('work_table_number');
            $table->boolean('projector');
            $table->boolean('smart_board');
            $table->boolean('tv');
            $table->boolean('wallboard_writing_board');
            $table->boolean('showcase');
            $table->boolean('moving_board');
            $table->boolean('sound_system');
            $table->boolean('visual_system');
            $table->boolean('gas_cooler');
            $table->boolean('ninety_network');
            $table->boolean('wireless_signal_cover');
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
        Schema::dropIfExists('classrooms');
    }
}
