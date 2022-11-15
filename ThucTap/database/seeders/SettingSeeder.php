<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            ['config_key' => 'phone_contact', 'config_value' => '0369794033','type' => 'text'],
            ['config_key' => 'email', 'config_value' => 'trung7192000@gmail.com','type' => 'text'],
            ['config_key' => 'facebook', 'config_value' => 'https://www.facebook.com/trungphung.19','type' => 'text'],
            ['config_key' => 'footer_information', 'config_value' => 'https://www.facebook.com/trungphung.19','type' => 'text'],
        ]);
    }
}
