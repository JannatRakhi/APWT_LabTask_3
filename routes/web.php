<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Middleware\ValidAdmin;

Route::view(uri:'/', view:'welcome')->name('/');
Route::view(uri:'/contact', view:'pages.contact')->name('contact');
Route::get('/error', function () {
    return view('pages.error');
})->name('error');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/login',[LoginController::class,'show'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/dashboard',[LoginController::class,'loginValidation'])->name('dashboard');

Route::get('/registration',[RegisterController::class,'showReg'])->name('registration');
Route::post('/login',[RegisterController::class,'registrationValidation'])->name('login'); 
// Route::get('/userList',[UserController::class,'userList'])->name('userList')->middleware([ValidAdmin::class]);
Route::get('/userList',[UserController::class,'userList'])->name('userList')->middleware([ValidAdmin::class]);
// Route::get('deleteSeller/{id}',[SellerController::class,'deleteSeller'])->name('deleteSeller/{id}')->middleware([ValidAdmin::class]);

Route::get('deleteUser/{id}',[UserController::class,'deleteUser'])->name('deleteUser/{id}')->middleware([ValidAdmin::class]);

Route::post('/addUser',[UserController::class,'listingUser'])->name('addUser')->middleware([ValidAdmin::class]);
Route::get('/addUser',[UserController::class,'allUser'])->name('addUser')->middleware([ValidAdmin::class]);

Route::get('/editUser/{id}',[UserController::class,'EditUser'])->name('editUser/{id}')->middleware([ValidAdmin::class]);
Route::post('/updateUser',[UserController::class,'updateUser'])->name('updateUser')->middleware([ValidAdmin::class]);

// Route::get('/dashboard',[AdminController::class,'showAdminProfile'])->name('dashboard');
//Admin Profile Edit
// Route::get('/editAdminProfile/{id}',[AdminController::class,'EditAdminProfile'])->name('editAdminProfile/{id}')->middleware([ValidAdmin::class]);
// Route::post('/updateAdminProfile',[AdminController::class,'updateAdminProfile'])->name('updateAdminProfile')->middleware([ValidAdmin::class]);

