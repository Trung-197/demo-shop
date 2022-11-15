<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Category One',
                'slug' => Str::slug('Category One'),
                'parent_id' => 0
            ],
            [
                'name' => 'Category Two',
                'slug' => Str::slug('Category Two'),
                'parent_id' => 0
            ],
            [
                'name' => 'Category Three',
                'slug' => Str::slug('Category Three'),
                'parent_id' => 0
            ],
            [
                'name' => 'Category One.1',
                'slug' => Str::slug('Category One.1'),
                'parent_id' => 1
            ],
            [
                'name' => 'Category One.2',
                'slug' => Str::slug('Category One.2'),
                'parent_id' => 1
            ],
            [
                'name' => 'Category One.3',
                'slug' => Str::slug('Category One.3'),
                'parent_id' => 1
            ],
            [
                'name' => 'Category Two.1',
                'slug' => Str::slug('Category Two.1'),
                'parent_id' => 2
            ],
            [
                'name' => 'Category Three.1',
                'slug' => Str::slug('Category Three.1'),
                'parent_id' => 3
            ],
            [
                'name' => 'Category Three.2',
                'slug' => Str::slug('Category Three.2'),
                'parent_id' => 3
            ]

        ]);
    }
}
