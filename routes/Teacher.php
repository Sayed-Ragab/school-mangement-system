<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginTeacherController;
use App\Http\Controllers\Quizz\QuizzController;
use App\Http\Controllers\Teacher\Quizze\QuezzController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Teacher\Dashbaord\StudentsController;
use App\Http\Controllers\Teacher\profile\profileTeacherController;
use App\Http\Controllers\Teacher\Questions\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function(){ //...


        Route::get('/dashboard/teacher', function () {

            $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
            $data['count_sections']= $ids->count();
            $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();
            return view('Dashboard.Auth.Teacher.dashboard',$data);
        })->middleware(['auth:teacher', 'verified']);


     

        
        Route::get('student',[StudentsController::class,'index'])->name('student.index'); 
        Route::get('sections',[StudentsController::class,'section'])->name('sections.section');  
        Route::POST('Attendance',[StudentsController::class,'attendance'])->name('Attendance'); 
        Route::POST('attendance/edit',[StudentsController::class,'attendance'])->name('attendance.edit');  
        Route::get('Report_Attendance',[StudentsController::class,'ReportAttendance'])->name('Report_Attendance'); 
        Route::POST('Report_Attendance',[StudentsController::class,'attendanceSearch'])->name('attendance.search'); 
        Route::resource('quizze',QuezzController::class);
        Route::resource('questions',QuestionController::class);
        Route::resource('profile-teacher',profileTeacherController::class);
        Route::get('student_quizze/{id}',[QuezzController::class,'student_quizze'])->name('student.quizze');
        Route::POST('repeat_quizze',[QuezzController::class,'repeat_quizze'])->name('repeat.quizze');

});

require __DIR__.'/auth.php';


?>
