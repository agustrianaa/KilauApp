<?php

use App\Http\Controllers\IbuController;
use App\Http\Controllers\AyahController;
use App\Http\Controllers\CalonAnakBinaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanAnakController;
use App\Http\Controllers\dataSurveyController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\surveyDataController;
use App\Http\Controllers\ValidasiSurveyController;
use App\Http\Controllers\ValidasiBeasiswaController;
use App\Http\Controllers\AnakBinaanController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TestCont;
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

    Route::get('/PengajuanForm',[PengajuanAnakController::class,'pengajuanForm'])->name('pengajuanForm');
    Route::post('/PengajuanFormStore',[PengajuanAnakController::class, 'pengajuanFormStore'])->name('pengajuanFormStore');
    Route::get('/AjukanAnak',[PengajuanAnakController::class,'AjukanAnak'])->name('AjukanIndex');
    Route::get('/CariKK',[PengajuanAnakController::class,'search'])->name('CariNoKK');
    Route::get('/anak/tambah', [PengajuanAnakController::class, 'tambahAnakForm'])->name('anak.tambah');
    Route::post('/anak/simpan', [PengajuanAnakController::class, 'simpanAnak'])->name('anak.simpan');
});

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/calonAnakBinaan', [CalonAnakBinaanController::class, 'calonanakbinaanIndex'])->name('calonanakbinaanIndex');
    Route::post('/save-calonAnakBinaan',[CalonAnakBinaanController::class,'store'])->name('save-calonAnakBinaan');
    Route::put('/calonAnakBinaan/{id_anaks}', [CalonAnakBinaanController::class, 'update'])->name('calonanakbinaanValidasi');
    Route::get('/calonAnakBinaanDetail/{id}/{id_anaks}', [CalonAnakBinaanController::class, 'showDetail'])->name('calonAnakBinaanDetail');
    Route::put('/calonAnakBinaanEdit/{id}', [CalonAnakBinaanController::class, 'updated'])->name('calonAnakBinaanStore');
    Route::put('/calonAnakBinaanEditAnak/{id_anaks}', [CalonAnakBinaanController::class, 'updatedAnak'])->name('calonAnakBinaanStoreAnak');
    Route::put('/calonAnakBinaanEditAyah/{id}', [CalonAnakBinaanController::class, 'updatedAyah'])->name('calonAnakBinaanStoreAyah');
    Route::put('/calonAnakBinaanEditIbu/{id}', [CalonAnakBinaanController::class, 'updatedIbu'])->name('calonAnakBinaanStoreIbu');
    Route::put('/calonAnakBinaanEditWali/{id}', [CalonAnakBinaanController::class, 'updatedWali'])->name('calonAnakBinaanStoreWali');
    Route::post('/calonAnakBinaanDelete', [CalonAnakBinaanController::class, 'destroyd'])->name('calonAnakBinaanDelete');
    Route::get('/carinomorKK', [CalonAnakBinaanController::class, 'cariKK'])->name('cariKK');

    Route::post('/getWilayah', [CalonAnakBinaanController::class, 'cariWilayah'])->name('cariWilayah');
    Route::post('/filterData', [CalonAnakBinaanController::class, 'filterData'])->name('filterData');

    Route::get('/surveyAnak', [SurveyController::class, 'indexSurvey'])->name('surveyAnak');
    Route::get('/surveyForm/{id}', [SurveyController::class, 'surveyForm'])->name('surveyForm');
    Route::post('/surveyStore', [SurveyController::class, 'store'])->name('surveyStore');
    Route::get('/surveyShow/{id}', [SurveyController::class, 'surveyShow'])->name('surveyShow');
    Route::put('/surveyEdit/{id}', [SurveyController::class, 'surveyEdit'])->name('surveyEdit');

    Route::get('/Test', [TestCont::class, 'indexTest'])->name('TestView');
    Route::get('/carinomorKK', [TestCont::class, 'cariNomorKK'])->name('cariNomorKK');

    Route::get('/AnakBinaan', [AnakBinaanController::class, 'index'])->name('AnakBinaan');
    Route::post('/AnakBinaanstore', [AnakBinaanController::class, 'store'])->name('AnakBinaanstore');
    Route::get('/AnakBinaanview/{id}', [AnakBinaanController::class, 'showViewPage'])->name('AnakBinaanview');
    Route::post('/AnakBinaanedit', [AnakBinaanController::class, 'edit'])->name('AnakBinaanedit');
    Route::get('/AnakBinaandelete/{id}', [AnakBinaanController::class, 'destroy'])->name('AnakBinaandelete');

    // Validasi Survey
    Route::get('/validasi-survey', [ValidasiSurveyController::class, 'index'])->name('validasi-survey');
    Route::get('/validasi/{id}', [ValidasiSurveyController::class, 'validation'])->name('validasi');
    Route::post('/survey-delete', [ValidasiSurveyController::class, 'destroy'])->name('survey-delete');
    Route::put('/update-validasi/{id}', [ValidasiSurveyController::class, 'update'])->name('save-validasi');

    // Route::put('/save/{id_anaks}', [ValidasiBeasiswaController::class, 'update'])->name('save');
    // Route::post('validasi/{id}/save-validasi', [ValidasiBeasiswaController::class, 'store'])->name('save-validasi');
    // Route::put('/update-validasi/{id}', [ValidasiBeasiswaController::class, 'update'])->name('update-validasi');
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('/acc', \App\Http\Controllers\AccController::class);


    // report
    Route::get('/report', [reportController::class,'index'])->name('report');
    Route::get('/table', [reportController::class,'table'])->name('table');
    Route::get('/wilbin', [reportController::class,'wilbin'])->name('wilbin');
    Route::get('/shelter', [reportController::class,'shelter'])->name('shelter');
});

Route::resource('/calon', CalonAnakBinaanController::class);

Route::resource('/datasurvey', \App\http\Controllers\dataSurveyController::class);

Route::get('/kembali', [dataSurveyController::class, 'back']);

// Data Ayah
Route::put('/updateayah/{idAyah}',[AyahController::class,'update'])->name('updateayah');
// Data Ibu
Route::put('/updateibu/{idIbu}', [IbuController::class, 'update'])->name('updateibu');


Route::resource('/calon', \App\Http\Controllers\CalonAnakBinaanController::class);

Route::resource('/datasurvey', \App\http\Controllers\dataSurveyController::class);

Route::get('/kembali', [dataSurveyController::class, 'back']);
