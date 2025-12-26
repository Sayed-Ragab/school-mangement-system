<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [

            ['key'=>'current_session', 'value'=>'2024-2025'],
            ['key'=>'school_title','value'=>'M.L.S'],
            ['key'=>'school_name','value'=>'Misr Language School'],
            ['key'=>'end_first_term','value'=>'01-12-2024'],
            ['key'=>'end_second_term','value'=>'01-3-2025'],
            ['key'=>'phone','value'=>'12345678910'],
            ['key' => 'address', 'value' => 'القاهرة'],
            ['key' => 'school_email', 'value' => 'school@learing.edu'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];


        DB::table('settings')->insert($data);
    }
}
