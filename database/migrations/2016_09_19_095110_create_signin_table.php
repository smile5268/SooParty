<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSigninTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signin', function (Blueprint $table){
          $table->increments('signin_id')->comment('id');
          $table->string('signin_integral')->comment('积分');
          $table->string('signin_userId')->comment('用户id');
          $table->date('signin_time')->comment('时间');
          $table->enum('signin_tate',['0','1','2','3','4','5'])->default(0)->comment('默认0,1发活动,2参加活动,3被关注,4自己关注自己,5签到'); 
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
