<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('dose')->unsigned()->comment('药量');
            $table->integer('check_price')->unsigned()->comment('检查费用');
            $table->integer('drug_price')->unsigned()->comment('药品费用');
            $table->integer('cure_price')->unsigned()->comment('治疗费用');
            $table->integer('hospital_price')->unsigned()->comment('住院费用');
            $table->string('content');
            $table->integer('user_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->integer('doctor_id')->unsigend();
            $table->integer('patient_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
