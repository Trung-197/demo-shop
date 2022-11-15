<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'category',
                'display_name' => 'category',
                'parent_id' => 0,
                'key_code' => 'category'
            ],
            [
                'name' => 'category list',
                'display_name' => 'category list',
                'parent_id' => 1,
                'key_code' => 'category_list'
            ],
            [
                'name' => 'category create',
                'display_name' => 'category create',
                'parent_id' => 1,
                'key_code' => 'category_create'
            ],
            [
                'name' => 'category edit',
                'display_name' => 'category edit',
                'parent_id' => 1,
                'key_code' => 'category_edit'
            ],
            [
                'name' => 'category delete',
                'display_name' => 'category delete',
                'parent_id' => 1,
                'key_code' => 'category_delete'
            ],
            [
                'name' => 'slider',
                'display_name' => 'slider',
                'parent_id' => 0,
                'key_code' => 'slider'
            ],
            [
                'name' => 'slider list',
                'display_name' => 'slider list',
                'parent_id' => 6,
                'key_code' => 'slider_list'
            ],
            [
                'name' => 'slider create',
                'display_name' => 'slider create',
                'parent_id' => 6,
                'key_code' => 'slider_create'
            ],
            [
                'name' => 'slider edit',
                'display_name' => 'slider edit',
                'parent_id' => 6,
                'key_code' => 'slider_edit'
            ],
            [
                'name' => 'slider delete',
                'display_name' => 'slider delete',
                'parent_id' => 6,
                'key_code' => 'slider_delete'
            ],
            [
                'name' => 'product',
                'display_name' => 'product',
                'parent_id' => 0,
                'key_code' => 'product'
            ],
            [
                'name' => 'product list',
                'display_name' => 'product list',
                'parent_id' => 11,
                'key_code' => 'product_list'
            ],
            [
                'name' => 'product create',
                'display_name' => 'product create',
                'parent_id' => 11,
                'key_code' => 'product_create'
            ],
            [
                'name' => 'product edit',
                'display_name' => 'product edit',
                'parent_id' => 11,
                'key_code' => 'product_edit'
            ],
            [
                'name' => 'product delete',
                'display_name' => 'product delete',
                'parent_id' => 11,
                'key_code' => 'product_delete'
            ],
            [
                'name' => 'setting',
                'display_name' => 'setting',
                'parent_id' => 0,
                'key_code' => 'setting'
            ],
            [
                'name' => 'setting list',
                'display_name' => 'setting list',
                'parent_id' => 16,
                'key_code' => 'setting_list'
            ],
            [
                'name' => 'setting create',
                'display_name' => 'setting create',
                'parent_id' => 16,
                'key_code' => 'setting_create'
            ],
            [
                'name' => 'setting edit',
                'display_name' => 'setting edit',
                'parent_id' => 16,
                'key_code' => 'setting_edit'
            ],
            [
                'name' => 'setting delete',
                'display_name' => 'setting delete',
                'parent_id' => 16,
                'key_code' => 'setting_delete'
            ],
            [
                'name' => 'user',
                'display_name' => 'user',
                'parent_id' => 0,
                'key_code' => 'user'
            ],
            [
                'name' => 'user list',
                'display_name' => 'user list',
                'parent_id' => 21,
                'key_code' => 'user_list'
            ],
            [
                'name' => 'user create',
                'display_name' => 'user create',
                'parent_id' => 21,
                'key_code' => 'user_create'
            ],
            [
                'name' => 'user edit',
                'display_name' => 'user edit',
                'parent_id' => 21,
                'key_code' => 'user_edit'
            ],
            [
                'name' => 'user delete',
                'display_name' => 'user delete',
                'parent_id' => 21,
                'key_code' => 'user_delete'
            ],
            [
                'name' => 'role',
                'display_name' => 'role',
                'parent_id' => 0,
                'key_code' => 'role'
            ],
            [
                'name' => 'role list',
                'display_name' => 'role list',
                'parent_id' => 26,
                'key_code' => 'role_list'
            ],
            [
                'name' => 'role create',
                'display_name' => 'role create',
                'parent_id' => 26,
                'key_code' => 'role_create'
            ],
            [
                'name' => 'role edit',
                'display_name' => 'role edit',
                'parent_id' => 26,
                'key_code' => 'role_edit'
            ],
            [
                'name' => 'role delete',
                'display_name' => 'role delete',
                'parent_id' => 26,
                'key_code' => 'role_delete'
            ],
            [
                'name' => 'permission',
                'display_name' => 'permission',
                'parent_id' => 0,
                'key_code' => 'permission'
            ],
            [
                'name' => 'permission create',
                'display_name' => 'permission create',
                'parent_id' => 31,
                'key_code' => 'permission_create'
            ],
        ]);
    }
}
