<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'price' => '100000',
                'feature_image_path' => 'girl1.jpg',
                'content' => 'content 1',
                'user_id' => '1',
                'category_id' => '4'
            ],
            [
                'name' => 'Product 2',
                'price' => '200000',
                'feature_image_path' => 'product4.jpg',
                'content' => 'content 2',
                'user_id' => '1',
                'category_id' => '4'
            ],
            [
                'name' => 'Product 3',
                'price' => '200000',
                'feature_image_path' => 'product2.jpg',
                'content' => 'content 3',
                'user_id' => '1',
                'category_id' => '4'
            ],
            [
                'name' => 'Product 4',
                'price' => '100000',
                'feature_image_path' => 'product3.jpg',
                'content' => 'content 4',
                'user_id' => '1',
                'category_id' => '4'
            ],
            [
                'name' => 'Product 5',
                'price' => '300000',
                'feature_image_path' => 'product5.jpg',
                'content' => 'content 5',
                'user_id' => '1',
                'category_id' => '5'
            ],
            [
                'name' => 'Product 6',
                'price' => '500000',
                'feature_image_path' => 'product6.jpg',
                'content' => 'content 6',
                'user_id' => '1',
                'category_id' => '5'
            ],
            [
                'name' => 'Product 7',
                'price' => '150000',
                'feature_image_path' => 'product2.jpg',
                'content' => 'content 7',
                'user_id' => '1',
                'category_id' => '6'
            ],
            [
                'name' => 'Product 8',
                'price' => '100000',
                'feature_image_path' => 'product3.jpg',
                'content' => 'content 8',
                'user_id' => '1',
                'category_id' => '6'
            ],
            [
                'name' => 'Product 9',
                'price' => '100000',
                'feature_image_path' => 'product4.jpg',
                'content' => 'content 9',
                'user_id' => '1',
                'category_id' => '6'
            ],
            [
                'name' => 'Product 10',
                'price' => '400000',
                'feature_image_path' => 'product5.jpg',
                'content' => 'content 10',
                'user_id' => '1',
                'category_id' => '6'
            ],
            [
                'name' => 'Product 11',
                'price' => '100000',
                'feature_image_path' => 'product6.jpg',
                'content' => 'content 11',
                'user_id' => '1',
                'category_id' => '7'
            ],
            [
                'name' => 'Product 12',
                'price' => '1200000',
                'feature_image_path' => 'product2.jpg',
                'content' => 'content 12',
                'user_id' => '1',
                'category_id' => '7'
            ],
            [
                'name' => 'Product 13',
                'price' => '150000',
                'feature_image_path' => 'product3.jpg',
                'content' => 'content 13',
                'user_id' => '1',
                'category_id' => '7'
            ],
            [
                'name' => 'Product 14',
                'price' => '100000',
                'feature_image_path' => 'product4.jpg',
                'content' => 'content 14',
                'user_id' => '1',
                'category_id' => '7'
            ],
            [
                'name' => 'Product 15',
                'price' => '600000',
                'feature_image_path' => 'product5.jpg',
                'content' => 'content 15',
                'user_id' => '1',
                'category_id' => '8'
            ],
            [
                'name' => 'Product 16',
                'price' => '100000',
                'feature_image_path' => 'girl1.jpg',
                'content' => 'content 16',
                'user_id' => '1',
                'category_id' => '8'
            ]
        ]);
    }
}
