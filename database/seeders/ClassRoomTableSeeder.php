<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\ClassRoom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_rooms')->delete();

        $classrooms = [
            ['en'=> 'First grade', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third grade', 'ar'=> 'الصف الثالث'],
        ];
        foreach($classrooms as $classroom){
            ClassRoom::create([
                'Name'=>$classroom,
                'Grade_id' => Grade::all()->unique()->random()->id
            ]);

        }
    }
}
