<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIllnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illnesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('hospital_id');
            $table->integer('sort')->default('0');
            $table->tinyInteger('active')->default('1');
        });

        Schema::table('patients', function(Blueprint $table){
            $table->foreign('illness_id')->references('id')->on('illnesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function(Blueprint $table){
            $table->dropForeign(['illness_id']);
        });

        Schema::dropIfExists('illnesses');

    }
}
