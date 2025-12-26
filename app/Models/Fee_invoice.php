<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_invoice extends Model
{
    use HasFactory;

    public  $guraded = [];
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
    public function ClassRoom()
    {
        return $this->belongsTo('App\Models\Classroom', 'class_id');
    }
    public function fees()
    {
        return $this->belongsTo('App\Models\Fee', 'fee_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function students()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
