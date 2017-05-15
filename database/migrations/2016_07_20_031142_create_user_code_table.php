<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_code', function (Blueprint $table) {
            $table->increments('id');
            $table->char('phone',11)->comment('手机号(账号)');
            $table->string('code',6)->comment('手机短信验证码');
            $table->datetime('start_time')->comment('验证码生效时间');
            $table->datetime('end_time')->comment('验证码失效时间');
            $table->string('found_ip',20)->comment('注册人IP地址');
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
        Schema::drop('user_code');
    }
}
