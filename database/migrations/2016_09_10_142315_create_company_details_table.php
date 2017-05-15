<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table){
        $table->increments('id')->comment('id');
        $table->string('company_name',100)->comment('公司名');
        $table->string('company_log',200)->comment('公司log'); 
        $table->text('company_introduction')->comment('公司介绍');
        $table->string('company_address',200)->comment('公司地址');
        $table->enum('company_push',['0','1'])->default(0)->comment('默认0不推,1推'); 
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
