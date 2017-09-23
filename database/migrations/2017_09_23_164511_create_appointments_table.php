<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->tinyInteger('age');
            $table->tinyInteger('gender');
            $table->integer('hospital_id')->unsigned();
            $table->integer('illness_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->integer('way_id')->unsigned()->comment('来源途径');
            $table->dateTime('book_date')->comment('预约时间');
            $table->integer('app_num')->comment('预约号');
            $table->string('address')->nullable()->comment('详细地址');
            $table->string('phone', '13');
            $table->string('qq')->nullable();
            $table->string('weixin')->nullable();
            $table->string('content')->comment('备注');
            $table->tinyInteger('province');
            $table->tinyInteger('city');
            $table->tinyInteger('town');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
