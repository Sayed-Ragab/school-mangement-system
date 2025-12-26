<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class online_classe extends Model
{
    use HasFactory;
    public $fillable= ['Grade_id','class_id','section_id','user_id','meeting_id','topic','start_at','duration','password','start_url','join_url'];



    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }


    public function section()
    {
        return $this->belongsTo(section::class, 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
