<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id')->comment('订单表');
            $table->string('serial',100)->comment('订单编号');
            $table->integer('addId')->comment('报名用户联系表ID');
            $table->string('state',10)->comment('0未付款;1付款;2取消;3退款');
            $table->string('operatorId',20)->comment('操作人ID');
            $table->string('payment',10)->comment('1.微信;2.支付宝');
            $table->decimal('money',18,2)->comment('支付金额(总额)');
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
        Schema::drop('order');
    }
}
