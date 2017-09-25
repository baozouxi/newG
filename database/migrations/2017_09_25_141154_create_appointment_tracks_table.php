<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->dateTime('next');
            $table->integer('user_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->integer('appointment_id')->unsigned();
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
        Schema::dropIfExists('appointment_tracks');
    }
}
