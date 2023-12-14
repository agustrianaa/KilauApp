<?php

use App\Http\Controllers\IbuController;
use App\Http\Controllers\AyahController;
use App\Http\Controllers\CalonAnakBinaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanAnakController;
use App\Http\Controllers\dataSurveyController;
use App\Http\Controllers\PengajuanDonaturController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\surveyDataController;
use App\Http\Controllers\ValidasiSurveyController;
use App\Http\Controllers\ValidasiBeasiswaController;
use App\Http\Controllers\AnakBinaanController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TutorController;
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

    // Dashboard Menu Settings
    Route::get('/Settings/Dashboard',[SettingsController::class,'settingIndex'])->name('settingView');

    // Kantor Cabang
    Route::get('/Settings/Data_Wilayah/KaCab',[SettingsController::class,'KaCabIndex'])->name('KaCabView'); // Tabel
    Route::get('/getKacab/{id_kacab}', [SettingsController::class, 'getKacab'])->name('getKacab'); // Get Data untuk Edit
    Route::put('/updateKacab/{id_kacab}', [SettingsController::class, 'updateKacab'])->name('updateKacab'); // Fungsi Update Edit
    Route::post('/deleteKacab', [SettingsController::class, 'deleteKacab'])->name('deleteKacab'); // Fungsi Delete
    Route::get('/Settings/Data_Wilayah/KaCab/Tambah_KaCab',[SettingsController::class,'tambahKacab'])->name('tambahKacabView'); // Form Tambah Kantor Cabang
    Route::post('/Settings/Data_Wilayah/KaCab/Tambah_KaCab/Simpan_Kacab',[SettingsController::class,'simpanKaCab'])->name('simpanKaCabFunc'); // Fungsi Simpan Kantor Cabang

    // Wilayah Binaan
    Route::get('/Settings/Data_Wilayah/WilBin',[SettingsController::class,'WilBinIndex'])->name('WilBinView'); // Tabel
    Route::get('/getWilbin/{id_wilbin}', [SettingsController::class, 'getWilbin'])->name('getWilbin'); // Get Data untuk Edit
    Route::put('/updateWilbin/{id_wilbin}', [SettingsController::class, 'updateWilbin'])->name('updateWilbin'); // Fungsi Update Edit
    Route::post('/deleteWilbin', [SettingsController::class, 'deleteWilbin'])->name('deleteWilbin'); // Fungsi Delete
    Route::get('/Settings/Data_Wilayah/WilBin/Tambah_WilBin',[SettingsController::class,'tambahWilBin'])->name('tambahWilBinView'); // Form Tambah Wilayah Binaan
    Route::get('/searchKacab', [SettingsController::class, 'getKantorCabang'])->name('getnamakacab'); // Fungsi Get Data Kantor Cabang
    Route::post('/simpanGetKacab', [SettingsController::class, 'simpanGetKacab'])->name('simpanGetKacab'); // Fungsi Simpan Wilayah Binaan

    // Shelter
    Route::get('/Settings/Data_Wilayah/Shelter',[SettingsController::class,'ShelterIndex'])->name('ShelterView');
    Route::get('/getShelter/{id_shelter}', [SettingsController::class, 'getShelter'])->name('getShelter'); // Get Data untuk Edit
    Route::put('/updateShelter/{id_shelter}', [SettingsController::class, 'updateShelter'])->name('updateShelter'); // Fungsi Update Edit
    Route::post('/deleteShelter', [SettingsController::class, 'deleteShelter'])->name('deleteShelter'); // Fungsi Delete
    Route::get('/Settings/Data_Wilayah/Shelter/Tambah_Shelter',[SettingsController::class,'tambahShelter'])->name('tambahShelterView');
    Route::get('/searchWilbin', [SettingsController::class, 'getWilayahBinaan'])->name('getnamaWilbin');
    Route::post('/simpanGetWilbin', [SettingsController::class, 'simpanGetWilbin'])->name('simpanGetWilbin');

    Route::get('/PengajuanForm',[PengajuanAnakController::class,'pengajuanForm'])->name('pengajuanForm');
    Route::post('/PengajuanFormStore',[PengajuanAnakController::class, 'pengajuanFormStore'])->name('pengajuanFormStore');
    Route::get('/CariKK',[PengajuanAnakController::class,'search'])->name('CariNoKK');
    Route::get('/anak/tambah', [PengajuanAnakController::class, 'tambahAnakForm'])->name('anak.tambah');
    Route::post('/anak/simpan', [PengajuanAnakController::class, 'simpanAnak'])->name('anak.simpan');
    Route::post('/checkKK', [PengajuanAnakController::class, 'checkKK'])->name('checkNoKK');

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

    Route::get('/cariWilayahBinaan/{kantorId}', [CalonAnakBinaanController::class, 'cariWilayahBinaan'])->name('cariWilayahBinaan');
    Route::get('/cariShelters/{wilbinId}', [CalonAnakBinaanController::class, 'cariShelters'])->name('cariShelters');

    Route::post('/getWilayah', [CalonAnakBinaanController::class, 'cariWilayah'])->name('cariWilayah');

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

    Route::post('/updateStatusAktif', [AnakBinaanController::class, 'updateStatusAktif'])->name('updateStatusAktif');

    Route::get('/cariWilBin/{kantorId}', [AnakBinaanController::class, 'cariWilBin'])->name('cariWilBin');
    Route::get('/cariShel/{wilbinId}', [AnakBinaanController::class, 'cariShel'])->name('cariShel');
    Route::get('/exportToExcel', [AnakBinaanController::class, 'exportToExcel'])->name('exportToExcel');

    // Validasi Survey
    Route::get('/validasi-survey', [ValidasiSurveyController::class, 'index'])->name('validasi-survey');
    Route::get('/validasi/{id}', [ValidasiSurveyController::class, 'validation'])->name('validasi');
    Route::post('/survey-delete', [ValidasiSurveyController::class, 'destroy'])->name('survey-delete');
    Route::put('/update-validasi/{id}', [ValidasiSurveyController::class, 'update'])->name('save-validasi');

    // Pengajuan Donatur
    Route::get('/pengajuan-donatur', [PengajuanDonaturController::class,'index'])->name('aju-donatur');
    Route::get('/pengajuan/{id?}', [PengajuanDonaturController::class,'show'])->name('pengajuan');
    Route::get('/cari-donatur', [PengajuanDonaturController::class,'search'])->name('cariDonatur');
    Route::post('/simpan-donatur', [PengajuanDonaturController::class,'store'])->name('simpanDonatur');
    Route::patch('/hapus-donatur', [PengajuanDonaturController::class, 'destroy'])->name('hapus-donatur');
    Route::get('/profile-donatur/{id}', [PengajuanDonaturController::class, 'profileDonatur'])->name('profile-donatur');

    // TUTOR
    Route::get('/tutor', [TutorController::class, 'index'])->name('tutor');
    Route::get('/addTutor', [TutorController::class, 'create'])->name('add-tutor');
    Route::post('/saveTutor', [TutorController::class, 'store'])->name('save-tutor');
    Route::post('/deleteTutor', [TutorController::class, 'destroy'])->name('delete-tutor');
    Route::get('/viewTutor/{id}', [TutorController::class, 'show'])->name('view-tutor');
    // Route::get('/addTutor/{id}/editTutor', [TutorController::class, 'edit'])->name('edit-tutor');
    Route::get('/editTutor/{id}', [TutorController::class, 'edit'])->name('edit-tutor');
    Route::get('/getTutor/{id}', [TutorController::class, 'get'])->name('get-tutor');

    //AREA
    Route::get('/get-wilbin/{kacabId}', [AreaController::class, 'getWilbin'])->name('get-wilbin');
    Route::get('/get-shelter/{wilbinId}', [AreaController::class, 'getShelter'])->name('get-shelter');

    // LAIN-LAIN
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('/acc', \App\Http\Controllers\AccController::class);

    // report
    Route::get('/report', [reportController::class,'index'])->name('report');
    Route::get('/table', [reportController::class,'table'])->name('table');
    Route::get('/wilbin', [reportController::class,'wilbin'])->name('wilbin');
    Route::get('/shelter', [reportController::class,'shelter'])->name('shelter');
    Route::get('/wilbinSurvey', [SurveyController::class,'wilbin'])->name('wilbinSurvey');
    Route::get('/shelterSurvey', [SurveyController::class,'shelter'])->name('shelterSurvey');
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
