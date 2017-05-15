<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call('UserTableSeeder');
        $this->call('ActivitiesTableSeeder');
        $this->call('ActivitiyCollectionTableSeeder');
        $this->call('ActivityImageTableSeeder');
        $this->call('ActivityPackageTableSeeder');
        $this->call('AddressTableSeeder');
        $this->call('AdminuserTableSeeder');
        $this->call('BankTableSeeder');
        $this->call('ChainTableSeeder');
        $this->call('CompanyDetailsTableSeeder');
        $this->call('EnterpriseTableSeeder');
        $this->call('FigureTableSeeder');
        $this->call('MigrationsTableSeeder');
        $this->call('OrderTableSeeder');
        $this->call('OrderDetailTableSeeder');
        $this->call('RealNameTableSeeder');
        $this->call('RecommendedTableSeeder');
        $this->call('SessionsTableSeeder');
        $this->call('ShoppingTableSeeder');
        $this->call('SigninTableSeeder');
        $this->call('UserCodeTableSeeder');
    }
}
