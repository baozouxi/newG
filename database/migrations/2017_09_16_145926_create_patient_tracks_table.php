<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //患者回访表
        Schema::create('patient_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('patient_id')->unsigned();
            $table->timestamp('next')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_tracks', function (Blueprint $table){
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('patient_tracks');
    }
}
