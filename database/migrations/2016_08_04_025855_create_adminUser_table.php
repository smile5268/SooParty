<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminUser', function (Blueprint $table) {
            $table->increments('id')->comment('管理员表');       
            $table->string('name',30)->comment('管理员'); 
            $table->string('usersName',30)->comment('姓名'); 
            $table->string('userPwd',20)->comment('密码');  
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
       Schema::drop('adminUser', function (Blueprint $table) {
            //
        });    
   }
}
