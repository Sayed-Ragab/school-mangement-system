<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Supject extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];

    protected $fillable = ['name','Grade_id','class_id','teacher_id'];


    public function Grade(){
        return $this->belongsTo(Grade::class,'Grade_id');
    }

    public function classRooms(){
        return $this->belongsTo(ClassRoom::class,'class_id');
    }

    public function Teachers(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

}
