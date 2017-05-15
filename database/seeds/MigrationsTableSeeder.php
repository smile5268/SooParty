<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'migration' => '2016_07_18_023554_create_activities_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'migration' => '2016_07_18_035611_add_com_to_activities_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'migration' => '2016_07_18_083127_add_new_to_activities_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'migration' => '2016_07_20_024632_create_user_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'migration' => '2016_07_20_031142_create_user_code_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'migration' => '2016_07_22_020626_update_user_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'migration' => '2016_07_22_025512_update_password_user_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'migration' => '2016_07_23_024619_add_sex_to_user_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'migration' => '2016_07_29_074410_update_number_to_activities_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'migration' => '2016_07_30_020547_create_collection_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'migration' => '2016_08_04_025855_create_adminUser_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'migration' => '2016_08_04_104614_add_state_to_adminuser_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'migration' => '2016_08_05_020316_add_level_to_adminuser_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'migration' => '2016_08_06_073045_create_sessions_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'migration' => '2016_08_08_025353_add_integral_to_adminuser_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'migration' => '2016_08_08_074645_add_deleted_at_to_user_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'migration' => '2016_08_10_015309_create_activity_image_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'migration' => '2016_08_17_025149_createte_address_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'migration' => '2016_08_17_033031_add_user_id_to_activities_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'migration' => '2016_08_17_063602_add_pro_to_activities_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'migration' => '2016_08_20_030621_create_shopping_table',
                'batch' => 1,
            ),
            21 => 
            array (
                'migration' => '2016_08_20_090657_table_number_to_shopping_table',
                'batch' => 1,
            ),
            22 => 
            array (
                'migration' => '2016_08_22_022035_add_deleted_at_to_activities_table',
                'batch' => 1,
            ),
            23 => 
            array (
                'migration' => '2016_08_22_024416_add_state_to_shopping_table',
                'batch' => 1,
            ),
            24 => 
            array (
                'migration' => '2016_08_25_075624_create_real_name_table',
                'batch' => 1,
            ),
            25 => 
            array (
                'migration' => '2016_08_25_081324_create_bank_table',
                'batch' => 1,
            ),
            26 => 
            array (
                'migration' => '2016_08_29_182748__reate_enterprise_table',
                'batch' => 1,
            ),
            27 => 
            array (
                'migration' => '2016_08_30_122918_add_real_name_to_user_table',
                'batch' => 1,
            ),
            28 => 
            array (
                'migration' => '2016_08_31_103027_create_package_table',
                'batch' => 1,
            ),
            29 => 
            array (
                'migration' => '2016_08_31_142055_up_price_package_table',
                'batch' => 1,
            ),
            30 => 
            array (
                'migration' => '2016_09_02_094115_add_phone_type_activities',
                'batch' => 1,
            ),
            31 => 
            array (
                'migration' => '2016_09_03_113250_create_recommended_table',
                'batch' => 1,
            ),
            32 => 
            array (
                'migration' => '2016_09_03_142626_add_prize_to_activities_table',
                'batch' => 1,
            ),
            33 => 
            array (
                'migration' => '2016_09_03_152720_add_hot_push_to_activities_table',
                'batch' => 1,
            ),
            34 => 
            array (
                'migration' => '2016_09_05_103521_del_dig_to_activities_table',
                'batch' => 1,
            ),
            35 => 
            array (
                'migration' => '2016_09_07_092444_create_figure_table',
                'batch' => 1,
            ),
            36 => 
            array (
                'migration' => '2016_09_07_141230_up_time_to_activities_table',
                'batch' => 1,
            ),
            37 => 
            array (
                'migration' => '2016_09_07_142317_add_actTime_to_activities_table',
                'batch' => 1,
            ),
            38 => 
            array (
                'migration' => '2016_09_08_091523_create_chain_table',
                'batch' => 1,
            ),
            39 => 
            array (
                'migration' => '2016_09_09_183005_create_order_detail_table',
                'batch' => 1,
            ),
            40 => 
            array (
                'migration' => '2016_09_09_185321_create_order_table',
                'batch' => 1,
            ),
            41 => 
            array (
                'migration' => '2016_09_10_142315_create_company_details_table',
                'batch' => 1,
            ),
            42 => 
            array (
                'migration' => '2016_09_12_174837_add_user_figure_to_user_table',
                'batch' => 1,
            ),
            43 => 
            array (
                'migration' => '2016_09_13_121645_add_activity_classes_to_user_table',
                'batch' => 1,
            ),
            44 => 
            array (
                'migration' => '2016_09_14_121023_add_thumbnail_to_activities_table',
                'batch' => 1,
            ),
            45 => 
            array (
                'migration' => '2016_09_18_163952_upload_userPwd_to_adminuser_table',
                'batch' => 1,
            ),
            46 => 
            array (
                'migration' => '2016_09_18_164654_add_userPwd_to_adminuser_table',
                'batch' => 1,
            ),
            47 => 
            array (
                'migration' => '2016_09_19_095110_create_signin_table',
                'batch' => 1,
            ),
            48 => 
            array (
                'migration' => '2016_09_22_140942_add_audit_to_activities_table',
                'batch' => 1,
            ),
            49 => 
            array (
                'migration' => '2016_09_23_161119_add_bank_account_to_bank_table',
                'batch' => 1,
            ),
            50 => 
            array (
                'migration' => '2016_09_28_122438_add_status_to_order_detail_table',
                'batch' => 1,
            ),
            51 => 
            array (
                'migration' => '2016_09_30_160950_add_tte_to_migrations_table',
                'batch' => 1,
            ),
            52 => 
            array (
                'migration' => '2016_09_30_161252_add_packageId_to_shopping_table',
                'batch' => 1,
            ),
            53 => 
            array (
                'migration' => '2016_09_30_162625_add_userid_toshopping_table',
                'batch' => 1,
            ),
        ));
        
        
    }
}
