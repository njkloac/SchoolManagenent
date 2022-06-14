<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\AdminController;
  

Route::get('/', [AuthController::class, 'index'])->name('login');

Route::get('/loginAdmin', [AuthController::class,'loginAdmin'])->name("loginAdmin");
Route::get('/loginProf', [AuthController::class,'loginProf'])->name("loginProf");
Route::get('/loginStudent', [AuthController::class,'loginStudent'])->name("loginStudent");
Route::get('/AddProf', [AuthController::class,'AddProf'])->name("AddProf");
Route::get('/AddStudent', [AuthController::class,'AddStudent'])->name("AddStudent");
Route::get('/AddFiliere', [AuthController::class,'AddFiliere'])->name("AddFiliere");
Route::get('/AddModule', [AuthController::class,'AddModule'])->name("AddModule");

Route::post('post-login',[AuthController::class, 'postLoginAdmin'])->name('login.postadmin');
Route::post('post-login', [AuthController::class, 'postLoginAdmin'])->name('login.postA'); 
Route::post('post-login', [AuthController::class, 'loginPostAdmin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('/AddPostProf', [AuthController::class,'AddPostProf'])->name("AddPostProf");
Route::post('/AddPostStudent', [AuthController::class,'AddPostStudent'])->name("AddPostStudent");

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('dashboardAdmin', [AuthController::class, 'dashboardAdmin']); 



Route::get('logout', [AuthController::class, 'logout'])->name('logout');