<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderRefundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_refund', function (Blueprint $table) {
            $table->increments('id')->comment('订单退款表');
            $table->integer('order_id')->comment('子订单ID');
            $table->string('account',50)->comment('用户账号');
            $table->string('name',50)->comment('用户名字');
            $table->dateTime('time')->comment('退款申请时间');
            $table->decimal('price',10,2)->comment('退款金额');
            $table->string('user_id')->comment('操作用户ID');
            $table->string('refund_state',10)->default(0)->comment('0退款申请 1退款成功 2退款失败 3取消退款');
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
        Schema::drop('order_refund');
    }
}
