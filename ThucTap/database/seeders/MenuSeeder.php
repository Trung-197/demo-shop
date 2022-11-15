<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'name' => 'Menu 1',
                'slug' => Str::slug('Menu 1'),
                'parent_id' => 0
            ],
            [
                'name' => 'Menu 2',
                'slug' => Str::slug('Menu 2'),
                'parent_id' => 0
            ],
            [
                'name' => 'Menu 3',
                'slug' => Str::slug('Menu 3'),
                'parent_id' => 0
            ],
            [
                'name' => 'Menu 1.1',
                'slug' => Str::slug('Menu 1.1'),
                'parent_id' => 1
            ],
            [
                'name' => 'Menu 1.2',
                'slug' => Str::slug('Menu 1.2'),
                'parent_id' => 1
            ],
            [
                'name' => 'Menu 1.3',
                'slug' => Str::slug('Menu 1.3'),
                'parent_id' => 1
            ],
            [
                'name' => 'Menu 2.1',
                'slug' => Str::slug('Menu 2.1'),
                'parent_id' => 2
            ],
            [
                'name' => 'Menu 3.1',
                'slug' => Str::slug('Menu 3.1'),
                'parent_id' => 3
            ]
        ]);
    }
}
