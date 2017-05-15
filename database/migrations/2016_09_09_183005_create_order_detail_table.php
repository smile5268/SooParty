<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id')->comment('订单详情表');
            $table->integer('orderId')->comment('订单ID');             
            $table->integer('actId')->comment('活动ID');             
            $table->integer('number')->comment('购买数量');             
            $table->integer('price')->comment('活动单价');             
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
        Schema::drop('order_detail');
    }
}
