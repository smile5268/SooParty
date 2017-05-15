<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStateToShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping', function (Blueprint $table) {
            $table->string('stats',10)->default(1)->comment('活动状态 1.未付款 2.已付款');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopping', function (Blueprint $table) {
            //
        });
    }
}
