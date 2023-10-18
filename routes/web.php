<?php

use App\Http\Controllers\IbuController;
use App\Http\Controllers\AyahController;
use App\Http\Controllers\CalonAnakBinaanController;
use App\Http\Controllers\DatakeluargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\PengajuanAnakController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\dataSurveyController;
use App\Http\Controllers\tabeldataController;
use App\Http\Controllers\ValidasiBeasiswaController;
use App\Http\Controllers\AnakBinaanController;
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

    Route::get('/a',[HomeController::class,'a'])->name('a');

    Route::get('/b',[AnakBinaanController::class,'totaldata'])->name('b');

    Route::get('/b',[AnakBinaanController::class,'b'])->name('b');

    Route::get('/PengajuanForm',[PengajuanAnakController::class,'pengajuanForm'])->name('pengajuanForm');
    Route::post('/PengajuanFormStore',[PengajuanAnakController::class, 'pengajuanFormStore'])->name('pengajuanFormStore');
});
    
    Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/calonAnakBinaan', [CalonAnakBinaanController::class, 'calonanakbinaanIndex'])->name('calonanakbinaanIndex');
    Route::get('/calonAnakBinaanDetail/{id}', [CalonAnakBinaanController::class, 'showDetail'])->name('calonAnakBinaanView');
    Route::get('/calonAnakBinaanStore', [CalonAnakBinaanController::class, 'updated'])->name('calonAnakBinaanStore');
    Route::get('/calonAnakBinaanEdit', [CalonAnakBinaanController::class, 'edited'])->name('calonAnakBinaanEdit');

    Route::get('/datakeluarga',[DatakeluargaController::class,'index'])->name('datakeluarga');
    Route::post('/save-datakeluarga',[DatakeluargaController::class,'store'])->name('save-datakeluarga');
    Route::post('/delete-datakeluarga',[DatakeluargaController::class,'destroy'])->name('delete-datakeluarga');
    Route::get('/detail-datakeluarga/{id}',[DatakeluargaController::class,'show'])->name('detail-datakeluarga');
    Route::put('/updatekeluarga/{idKeluarga}',[DatakeluargaController::class,'update'])->name('updatekeluarga');

    Route::get('/AnakBinaan', [AnakBinaanController::class, 'index'])->name('AnakBinaan');
    Route::post('/AnakBinaanstore', [AnakBinaanController::class, 'store'])->name('AnakBinaanstore');
    Route::get('/AnakBinaanview/{id}', [AnakBinaanController::class, 'showViewPage'])->name('AnakBinaanview');
    Route::post('/AnakBinaanedit', [AnakBinaanController::class, 'edit'])->name('AnakBinaanedit');
    Route::post('/AnakBinaandelete', [AnakBinaanController::class, 'destroy'])->name('AnakBinaandelete');

    // Validasi Beasiswa
    Route::get('/validasi-beasiswa', [ValidasiBeasiswaController::class, 'index'])->name('validasi-beasiswa');
    Route::get('/validasi/{id}', [ValidasiBeasiswaController::class, 'validation'])->name('validasi');
    Route::put('/save-validasi', [ValidasiBeasiswaController::class, 'store'])->name('save-validasi');
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('/acc', \App\Http\Controllers\AccController::class);
});

Route::resource('/calon', CalonAnakBinaanController::class);

Route::resource('/datasurvey', \App\http\Controllers\dataSurveyController::class);

Route::get('/kembali', [dataSurveyController::class, 'back']);
Route::post('/upload', [PostController::class, 'upload'])->name('posts.upload');

// Data Ayah
Route::put('/updateayah/{idAyah}',[AyahController::class,'update'])->name('updateayah');
// Data Ibu
Route::put('/updateibu/{idIbu}', [IbuController::class, 'update'])->name('updateibu');


Route::resource('/calon', \App\Http\Controllers\CalonAnakBinaanController::class);

Route::resource('/datasurvey', \App\http\Controllers\dataSurveyController::class);

Route::get('/kembali', [dataSurveyController::class, 'back']);