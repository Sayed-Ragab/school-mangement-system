<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->delete();
        DB::table('Users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
