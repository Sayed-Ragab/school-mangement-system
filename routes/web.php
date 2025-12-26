<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Quizz\QuizzController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Supject\SupjectController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\StudnetController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\ClassRoom\ClassRoomController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Students\promoctionController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\OnlineClasseController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('dashboard',[HomeController::class,'create'])->name('dashboard');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
  

    

Route::get('/dashboard', function () {
    return view('Dashboard.Auth.Admin.dashboard');
})->middleware(['auth'])->name('dashboard');





Route::resource('Grades',GradeController::class);
Route::resource('Classrooms',ClassRoomController::class);
Route::Post('Filter_Classes',[ClassRoomController::class,'Filter_Classes'])->name('Filter_Classes');
Route::Post('Delete_All',[ClassRoomController::class,'delete_all'])->name('Delete_All');

Route::resource('Sections',SectionController::class);
Route::get('/classes/{id}',[SectionController::class,'getclasses'])->name('classes');

Route::view('add_parent','Livewire.parents.ShowForm')->name('add_parent');
Route::view('calender','Livewire.Calender.calender');
Route::resource('Teachers',TeacherController::class);

Route::resource('Students',StudnetController::class);
Route::get('/Get_classrooms/{id}',[StudnetController::class,'Get_classrooms']);
Route::get('/Get_Sections/{id}',[StudnetController::class,'Get_Sections']);
Route::Post('Upload_Attachment',[StudnetController::class,'upload_Attachment']);
Route::get('Download_attachment/{studentsname}/{filename}', [StudnetController::class,'Download_attachment'])->name('Download_attachment');
Route::post('Delete_attachment/{Student}', [StudnetController::class,'Delete_attachment'])->name('Delete_attachment');
Route::resource('Promotion',promoctionController::class);
Route::resource('Graduated',GraduatedController::class);
Route::resource('Fees',FeesController::class);
Route::resource('Fees_Invoices',FeesInvoicesController::class);
Route::resource('receipt_students',ReceiptStudentsController::class);
Route::resource('ProcessingFee',ProcessingFeeController::class);
Route::resource('Pyment_Students',PaymentController::class);
Route::resource('Attendance',AttendanceController::class);
Route::resource('Subject',SupjectController::class);
Route::resource('Quizze',QuizzController::class);
Route::resource('questions',QuestionController::class);
Route::resource('online_classes',OnlineClasseController::class);
Route::resource('Library',LibraryController::class);
Route::get('download_file/{filename}', [LibraryController::class,'downloadAttachment'])->name('downloadAttachment');
Route::resource('setting',SettingController::class);


});

Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';