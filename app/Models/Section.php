<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    
    
    public $translatable = ['Name'];
    protected $fillable=['Name','Grade_id','class_id'];

    public function classes()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }
    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
}
