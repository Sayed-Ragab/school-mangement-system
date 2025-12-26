<?php

use App\Http\Controllers\Students\dashboard\ExamStudentController;
use App\Http\Controllers\Students\dashboard\profileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:student' ]
    ], function(){ //...


Route::get('/dashboard/student', function () {
    return view('Dashboard.Auth.Student.dashboard');
})->middleware(['auth:student', 'verified'])->name('dashboard.student');


Route::get('/', function () {
    return view('welcome');
});

Route::resource('Exam',ExamStudentController::class);
Route::resource('profile-student',profileController::class);
});


require __DIR__.'/auth.php';

?>