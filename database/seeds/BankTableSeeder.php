<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bank')->delete();
        
        
        
    }
}
