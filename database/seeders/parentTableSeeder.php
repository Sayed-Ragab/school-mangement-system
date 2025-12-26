<?php

namespace Database\Seeders;

use App\Models\Religion;
use App\Models\My_Parent;
use App\Models\blood_type;
use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class parentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();
        $my_parents = new My_Parent();
        $my_parents->email = "AlsayedRagab1@Gmail.com";
        $my_parents->password = Hash::make('123456789');
        $my_parents->Name_Father = ['en' => 'Ragab Abu Al-Fotouh Gad', 'ar' =>  'رجب ابو الفتوح جاد'];
        $my_parents->National_ID_Father = '25412365489';
        $my_parents->Passport_ID_Father = '1234567810123';
        $my_parents->Phone_Father = '1023575447';
        $my_parents->Job_Father = ['en' => 'programmer', 'ar' => 'مبرمج'];
        $my_parents->Nationality_Father_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->Blood_Type_Father_id =blood_type::all()->unique()->random()->id;
        $my_parents->Religion_Father_id = Religion::all()->unique()->random()->id;
        $my_parents->Address_Father ='القاهرة';

        $my_parents->Name_Mother = ['en' => 'SS', 'ar' => 'سس'];
        $my_parents->National_ID_Mother = '1234567810';
        $my_parents->Passport_ID_Mother = '1234567810';
        $my_parents->Phone_Mother = '1234567810';
        $my_parents->Job_Mother = ['en' => 'Teacher', 'ar' => 'معلمة'];
        $my_parents->Nationality_Mother_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->Blood_Type_Mother_id =blood_type::all()->unique()->random()->id;
        $my_parents->Religion_Mother_id = Religion::all()->unique()->random()->id;
        $my_parents->Address_Mother ='القاهرة';
        $my_parents->save();
        
        
    }
}
