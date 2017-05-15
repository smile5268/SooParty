<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_name', function (Blueprint $table){
          $table->increments('id')->comment('实名认证id');
          $table->string('uname',25)->comment('用户id');
          $table->string('id_number',18)->comment('身份证号');
          $table->integer('num')->comment('关联id');
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
        //
    }
}
