<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chain', function (Blueprint $table){
          $table->increments('id')->comment('id');
          $table->string('siteed')->comment('链接地址');
          $table->string('photoed')->comment('照片路径');
          $table->enum('location',['0','1'])->comment('默认0上,1下'); 
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
