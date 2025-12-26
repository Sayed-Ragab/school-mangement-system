<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parent\ParentController;
use App\Http\Controllers\Parent\FeesParentController;
use App\Http\Controllers\Parent\profileParentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;







Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:parent' ]
    ], function(){ //...


Route::get('/dashboard/parent', function () {
    $sons = Student::Where('parent_id',Auth()->user()->id)->get();
    return view('Dashboard.Auth.Parent.dashboard',compact('sons'));
})->middleware(['auth:parent', 'verified'])->name('dashboard.parent');

Route::resource('parent',ParentController::class);
Route::get('fees',[FeesParentController::class,'fees'])->name('fees');
Route::get('Recipt/{id}',[FeesParentController::class,'receiptStudent'])->name('Recipt');
Route::get('profile',[profileParentController::class,'index'])->name('profile.index');
Route::post('profile/{id}', [profileParentController::class,'update'])->name('profile.update');
});


require __DIR__.'/auth.php';

?>
