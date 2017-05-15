<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReateEnterpriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprise', function (Blueprint $table){
          $table->increments('id')->comment('企业认证id');
          $table->string('enter_name',100)->comment('企业名');
          $table->string('enter_headname',100)->comment('负责人名字');
          $table->string('enter_number',18)->comment('负责人身份证号');
          $table->string('enter_file',100)->comment('营业执照');
          $table->integer('user_id')->comment('关联id');
          $table->enum('tate',['0','1','2'])->comment('默认0审核中,1通过,2没通过'); 
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
