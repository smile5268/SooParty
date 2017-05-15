<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_package', function (Blueprint $table) {
            $table->increments('id')->comment('活动套餐表');
            $table->integer('act_id')->comment('活动ID');
            $table->decimal('cost',10,2)->comment('价格');
            $table->string('describe',100)->comment('套餐描述');
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
        Schema::drop('activity_package');
    }
}
