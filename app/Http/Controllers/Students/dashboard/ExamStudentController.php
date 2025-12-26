<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Models\Quizze;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamStudentController extends Controller
{
    public function index(){

        $quizzes = Quizze::where('Grade_id', auth()->user()->Grade_id)
        ->where('class_id', auth()->user()->class_id)
        ->where('section_id', auth()->user()->section_id)
        ->orderBy('id', 'DESC')
        ->get();

        return view('Dashboard.Students.dashboard.exams.index',compact('quizzes'));
    }
    public function show($quizze_id){
        $student_id = Auth()->user()->id;
        return view('Dashboard.Students.dashboard.exams.show',compact('quizze_id','student_id'));

    }

}
