<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Authenticatable
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded=[];

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
 
    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function Genders()
    {
        return $this->belongsTo(Gender::class, 'Gender_id');
    }

// علاقة المعلمين مع الاقسام
    public function Sections()
    {
        return $this->belongsToMany(section::class,'teacher_section');
    }
 
}
