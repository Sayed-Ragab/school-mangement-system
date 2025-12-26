<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name'];
    protected $fillable=['Name','Grade_id'];


    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
}
