<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users') -> insert([
            [
                'name' => 'Dao Thao',
                'username' => 'admin',
                'email' => 'thaoadmin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('daothao')
            ],
            [
                'name' => 'Thao Dao',
                'username' => 'user',
                'email' => 'thaouser@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('daothao')
            ],
            [
                'name' => 'DT Thao',
                'username' => 'vendor',
                'email' => 'thaovendor@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('daothao')
            ]
        ]
        );
    }
}