<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->string('activity_name',50)->comment('活动名称');
            $table->string('prize_name',50)->comment('奖品名称');
            $table->string('activity_type',10)->comment('活动类型 1企业互动 2兴趣部落 3夺宝活动');
            $table->decimal('activity_price',10,2)->comment('活动价格');
            $table->dateTime('activity_start_time')->comment('活动开始时间');
            $table->dateTime('activity_end_time')->comment('活动结束时间');
            $table->string('activity_address')->comment('活动地址');
            $table->string('activity_describe')->comment('活动描述[列表页展示]');
            $table->text('activity_details')->comment('活动详情');
            $table->string('activity_state',10)->default(0)->comment('是否上架,默认值0  0上架 1下架 2禁用');
            $table->integer('activity_number')->comment('活动人数上限');
            $table->string('activity_classes',10)->default(0)->comment('活动性质,默认值0  0个人 1企业');
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
        Schema::table('activities', function (Blueprint $table) {
            //
        });
    }
}
