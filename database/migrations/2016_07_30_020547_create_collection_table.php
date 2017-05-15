<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitiy_collection', function (Blueprint $table) {
            $table->increments('id')->comment('活动收藏表');
            $table->integer('user_id')->comment('用户ID');
            $table->integer('act_id')->comment('活动ID');
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
        Schema::drop('activitiy_collection');
    }
}
