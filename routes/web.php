<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\WavecafeController;
Use App\Http\Controllers\AdminController;
Use App\Http\Controllers\OwnerController;
Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\BeverageController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('testadmin', function () {
    return view('testadmin');
});

// ________________wavecafe routes________________________________
Route::get('wavecafe',[WavecafeController::class,'wavecafe'])->name('wavecafee');
Route::post('contact',[WavecafeController::class,'store'])->name('wavecafe');
Route::get('sendmail',[WavecafeController::class,'mailfromcontact'])->name('contactmail');

// ___________admin routes________________________________________________
Route::prefix('admin')->group(function(){
    Route::get('adduser',[OwnerController::class,'create'])->middleware('verified')->name('adduser');
    Route::post('insertuser',[OwnerController::class,'store'])->name('insertuser');
    Route::get('users',[OwnerController::class,'index'])->middleware('verified')->name('users');
    Route::get('showuser/{id}',[OwnerController::class,'show'])->middleware('verified')->name('showuser');
    Route::get('edituser/{id}',[OwnerController::class,'edit'])->middleware('verified')->name('edituser');
    Route::put('updateuser/{id}',[OwnerController::class,'update'])->middleware('verified')->name('updateuser');
    Route::delete('deleteuser/{id}',[OwnerController::class,'destroy'])->middleware('verified')->name('deleteuser');
    Route::get('restoreuser/{id}',[OwnerController::class,'restore'])->middleware('verified')->name('restoreuser');
    Route::get('forcedeluser/{id}',[OwnerController::class,'forcedelete'])->middleware('verified')->name('forcedeluser');
    Route::get('trashedusers',[OwnerController::class,'trash'])->middleware('verified')->name('trashedusers');
   
    Route::get('addcategories',[CategoryController::class,'create'])->middleware('verified')->name('addcategories');
    Route::post('insertcategory',[CategoryController::class,'store'])->middleware('verified')->name('insertcategory');
    Route::get('categories',[CategoryController::class,'index'])->middleware('verified')->name('categories');
    Route::get('editcategory/{id}',[CategoryController::class,'edit'])->middleware('verified')->name('editcategory');
    Route::put('updatecategory/{id}',[CategoryController::class,'update'])->middleware('verified')->name('updatecategory');
    Route::delete('deletecategory/{id}',[CategoryController::class,'destroy'])->middleware('verified')->name('deletecategory');
    Route::get('addbeverage',[BeverageController::class,'create'])->middleware('verified')->name('addbeverage');
    Route::post('insertbeverage',[BeverageController::class,'store'])->middleware('verified')->name('insertbeverage');
    Route::get('beverages',[BeverageController::class,'index'])->middleware('verified')->name('beverages');
    Route::get('editbeverage/{id}',[BeverageController::class,'edit'])->middleware('verified')->name('editbeverage');
    Route::put('updatebeverage/{id}',[BeverageController::class,'update'])->middleware('verified')->name('updatebeverage');
    Route::delete('deletebeverage/{id}',[BeverageController::class,'destroy'])->middleware('verified')->name('deletebeverage');
    Route::get('specialitems',[AdminController::class,'index'])->name('specialitem');
    Route::get('messages',[AdminController::class,'messages'])->middleware('verified')->name('messages');
    Route::get('showmessage/{id}',[AdminController::class,'show'])->middleware('verified')->name('showmessage');
    Route::delete('deletemessage',[AdminController::class,'destroymessage'])->middleware('verified')->name('deletemessage');
 
});
Route::get('/', function () {
    return view('auth.combined_form');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
