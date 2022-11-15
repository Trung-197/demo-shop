<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            ['name' => 'Slider 1', 'description' => 'Description 1','image_path' => 'girl1.jpg'],
            ['name' => 'Slider 2', 'description' => 'Description 2','image_path' => 'girl2.jpg'],
            ['name' => 'Slider 3', 'description' => 'Description 3','image_path' => 'girl3.jpg'],
            ['name' => 'Slider 4', 'description' => 'Description 4', 'image_path' => 'girl1.jpg'],
        ]);
    }
}
