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

    Route::get('/a',[HomeController::class,'a'])->name('a');

    Route::get('/b',[tabeldataController::class,'totaldata'])->name('b');

    Route::get('/b',[tabeldataController::class,'b'])->name('b');

    Route::get('/PengajuanForm',[PengajuanAnakController::class,'pengajuanForm'])->name('pengajuanForm');
    Route::post('/PengajuanFormStore',[PengajuanAnakController::class, 'pengajuanFormStore'])->name('pengajuanFormStore');

    Route::get('/calonAnakBinaan', [CalonAnakBinaanController::class, 'calonanakbinaan'])->name('calonanakbinaan');
    // Route::post('/tabeldatastore', [tabeldataController::class, 'store'])->name('tabeldatastore');
    // Route::get('/tabeldataview/{id}', [tabeldataController::class, 'showViewPage'])->name('tabeldataview');
    // Route::post('/tabeldataedit', [tabeldataController::class, 'edit'])->name('tabeldataedit');
    // Route::post('/tabeldatadelete', [tabeldataController::class, 'destroy'])->name('tabeldatadelete');

    Route::get('/datakeluarga',[DatakeluargaController::class,'index'])->name('datakeluarga');
    Route::post('/save-datakeluarga',[DatakeluargaController::class,'store'])->name('save-datakeluarga');
    Route::post('/delete-datakeluarga',[DatakeluargaController::class,'destroy'])->name('delete-datakeluarga');
    Route::get('/detail-datakeluarga/{id}',[DatakeluargaController::class,'show'])->name('detail-datakeluarga');
    Route::put('/updatekeluarga/{idKeluarga}',[DatakeluargaController::class,'update'])->name('updatekeluarga');

    Route::get('/tabeldata', [tabeldataController::class, 'index'])->name('tabeldata');
    Route::post('/tabeldatastore', [tabeldataController::class, 'store'])->name('tabeldatastore');
    Route::get('/tabeldataview/{id}', [tabeldataController::class, 'showViewPage'])->name('tabeldataview');
    Route::post('/tabeldataedit', [tabeldataController::class, 'edit'])->name('tabeldataedit');
    Route::post('/tabeldatadelete', [tabeldataController::class, 'destroy'])->name('tabeldatadelete');

    Route::get('/datakeluarga',[DatakeluargaController::class,'index'])->name('datakeluarga');
    Route::post('/save-datakeluarga',[DatakeluargaController::class,'store'])->name('save-datakeluarga');
    Route::post('/delete-datakeluarga',[DatakeluargaController::class,'destroy'])->name('delete-datakeluarga');
    Route::get('/detail-datakeluarga/{id}',[DatakeluargaController::class,'show'])->name('detail-datakeluarga');
    Route::put('/updatekeluarga/{idKeluarga}',[DatakeluargaController::class,'update'])->name('updatekeluarga');

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

