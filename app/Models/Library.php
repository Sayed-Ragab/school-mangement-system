<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function teacher(){

        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    
}
