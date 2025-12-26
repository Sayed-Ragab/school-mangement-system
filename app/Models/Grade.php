<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    public $fillable = ['Name'];

    use HasTranslations;

    public $translatable = ['Name'];

    public function Sections()
    {
        return $this->hasMany(Section::class, 'Grade_id');
    }
    public function teacher(){
        
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
