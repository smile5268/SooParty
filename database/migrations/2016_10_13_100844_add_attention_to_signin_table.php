<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttentionToSigninTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signin', function (Blueprint $table) {
            $table->integer('attention')->comment('关注人的id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signin', function (Blueprint $table) {
            $table->dropColumn('attention');
        });
    }
}
