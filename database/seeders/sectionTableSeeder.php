<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\ClassRoom;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class sectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $sections =[
            ['en' => 'a', 'ar' => 'ا'],
            ['en' => 'b', 'ar' => 'ب'],
            ['en' => 'c', 'ar' => 'ت'],
        ];
        foreach($sections as $section){
            Section::Create([
                'Name' => $section,
                'status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'class_id' => ClassRoom::all()->unique()->random()->id
            ]);
          
        }
    }
}
