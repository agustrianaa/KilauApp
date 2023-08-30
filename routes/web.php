<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\tabeldataController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     echo 'HI';
// });

Route::get('/',[HomeController::class,'welcome_page'])->name('welcomePage');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/menu',[HomeController::class,'menu'])->name('menu');

    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    Route::get('/user',[HomeController::class,'index'])->name('index');

    Route::get('/create',[HomeController::class,'create'])->name('user.create');
    Route::post('/store',[HomeController::class,'store'])->name('user.store');

    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');

    Route::get('/ajax-crud-datatable', [tabeldataController::class, 'index'])->name('ajax-crud-datatable');
    Route::post('/tabeldatastore', [tabeldataController::class, 'store'])->name('tabeldatastore');
    Route::post('/tabeldataedit', [tabeldataController::class, 'edit'])->name('tabeldataedit');
    Route::post('/tabeldatadelete', [tabeldataController::class, 'destroy'])->name('tabeldatadelete');

    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/standards', [StudentController::class, 'getStandard'])->name('standards');
    Route::get('/results', [StudentController::class, 'getResult'])->name('results');
    Route::get('/students/records', [StudentController::class, 'records'])->name('students/records');
});