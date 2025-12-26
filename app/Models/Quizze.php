<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    public $guarded=[];

    public function Teachers(){

        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function subject(){
            return $this->belongsTo(Supject::class,'supject_id');
    }


    public function Grades(){

        return $this->belongsTo(Grade::class,'Grade_id');
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function degree()
    {
        return $this->hasMany('App\Models\Degree');
        
    }



}
