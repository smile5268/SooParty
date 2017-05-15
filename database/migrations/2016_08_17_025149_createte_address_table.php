<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateteAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
             $table->increments('id')->comment('地址id');
             $table->integer('usernameid')->comment('用户id');
             $table->string('consignee',100)->comment('收货人');     
             $table->string('shippingaddress')->comment('收货地址'); 
             $table->string('cardnumber',18)->comment('身份证号码');
             $table->string('phonenumber',11)->comment('手机号码');
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
