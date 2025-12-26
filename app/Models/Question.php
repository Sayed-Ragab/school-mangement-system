<?php

namespace App\Models;

use App\Models\Quizz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;


    

    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizze','quizze_id');
    }
}
