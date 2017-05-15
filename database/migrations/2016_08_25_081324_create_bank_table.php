<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table){
          $table->increments('id')->comment('银行卡id');
          $table->string('uname',25)->comment('用户id');
          $table->string('bank_category',18)->comment('银行卡类别');
          $table->integer('bank_num')->comment('关联id');
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
