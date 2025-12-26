<?php

namespace App\Models;


use App\Models\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;
    public $translatable = ['name'];
    public $guarded = [];

    public function Genders(){
        return $this->belongsTo(Gender::class,'Gender_id');
    }

    public function Grades(){
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    public function ClassRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image','image');
    }

    public function Nationality(){
        return $this->belongsTo(Nationalitie::class,'nationalitie_id');
    }

    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }
    public function student_account(){
        return $this->hasMany('App\Models\StudentAccount', 'student_id');
    }
    public function attendance(){
        return $this->hasMany(Attendance::class,'student_id');
    }
}
