<?php

use Illuminate\Database\Seeder;

class AdminuserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('adminuser')->delete();
        
        
        
    }
}
