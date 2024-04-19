<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin', 'password' => \Hash::make('admin'), 'role_id' => 1],
            ['name' => 'user', 'email' => 'user', 'password' => \Hash::make('user'), 'role_id' => 2],
        ]);
    }
}