<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title'];
    protected $fillable=['title','amount','Grade_id','class_id','year','description','Fee_type'];

    public function Gredes(){
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    public function ClassRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}
