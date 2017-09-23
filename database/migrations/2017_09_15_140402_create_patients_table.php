<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->tinyInteger('gender')->comment('性别');
            $table->tinyInteger('age');
            $table->string('phone')->unique();
            $table->string('medical_num')->unique()->comment('病历号 唯一');
            $table->integer('user_id')->comment('添加人员');
            $table->integer('illness_id')->unsigned()->comment('病种ID');
            $table->integer('doctor_id')->comment('医生ID');
            $table->integer('ad_id')->comment('广告来源ID');
            $table->integer('province');
            $table->integer('city');
            $table->integer('town');
            $table->integer('hospital_id')->comment('医院ID');
            $table->integer('book_id')->default(0)->comment('预约ID，用来判断是否由预约生成');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
