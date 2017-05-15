<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',20)->comment('账号');
            $table->string('passwords',60)->comment('密码');
            $table->dateTime('register_time')->comment('注册时间');
            $table->dateTime('login_time')->comment('登录时间');  
            $table->string('password',60)->default(0)->comment('状态,默认0 0开启，1禁用');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
