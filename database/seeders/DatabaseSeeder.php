<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
        AdminTableSeeder::class,
        GradeTableSeeder::class,
        ClassRoomTableSeeder::class,
        sectionTableSeeder::class,
        BloodTypeTableSeerder::class,
        NationalitieTableSeeder::class,
        ReligionTableSeeder::class,
        SpecializationsTableSeeder::class,
        GenderTableSeeder::class,
        parentTableSeeder::class,
        SettingsTableSeeder::class,
      
        
        
       ]);
    }
}
