<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\RombelController as AdminRombel;
use App\Http\Controllers\Admin\RayonController as AdminRayon;
use App\Http\Controllers\Admin\SiswaController as AdminSiswa;
use App\Http\Controllers\Admin\UpdController as AdminUpd;
use App\Http\Controllers\Admin\SenbudController as AdminSenbud;
use App\Http\Controllers\Admin\InstructureController as AdminInstruktur;
use App\Http\Controllers\Admin\InstructureProdController as AdminInstrukturProd;
use App\Http\Controllers\Admin\GurusenbudController as AdminGS;
use App\Http\Controllers\Admin\PJRayonController as AdminPJR;
use App\Http\Controllers\Admin\KoordinatorController as AdminKoordinator;
use App\Http\Controllers\Admin\UpdprodController as AdminUpdprod;
use App\Http\Controllers\Admin\ContentController as AdminContent;
use App\Http\Controllers\Admin\LoginController as AdminLogin;
use App\Http\Controllers\Admin\AbsenController as AdminAbsen;
use App\Http\Controllers\Admin\AbsenDetailsController as AdminAbsenDet;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PageController::class, 'landing']);
// Route::get('upd', [PageController::class, 'upd']);
Route::get('about', [PageController::class, 'about']);



Route::get('contact', function () {
    return view('dashboard.kontak');
});


Route::get('updprod', function () {
    return view('dashboard.updprod');
});
Route::get('senbud', function () {
    return view('dashboard.senbud');
});

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        
        Route::group(['middleware' => ['cek_login:Siswa']], function(){
            Route::resource('siswa', AdminSiswa::class);
        });        
        Route::group(['middleware' => ['cek_login:Koordinator Senbud & UPD']], function(){
            Route::resource('upd', AdminUpd::class);
            Route::resource('gurusenbud', AdminGS::class);
            Route::resource('student', AdminSiswa::class);
            Route::resource('senbud', AdminSenbud::class);
            Route::resource('updprod', AdminUpdprod::class);
            Route::resource('instruktur', AdminInstruktur::class); 
            Route::resource('instrukturprod', AdminInstrukturProd::class);            
            Route::resource('pjr', AdminPJR::class);
            Route::resource('koordinator', AdminKoordinator::class);
            Route::get('content', [AdminContent::class, 'index'])->name('admin.form.content');
            Route::post('content', [AdminContent::class, 'save'])->name('admin.form.content.post');             
            Route::resource('user', AdminUser::class);
            Route::resource('rombel', AdminRombel::class);
            Route::resource('rayon', AdminRayon::class);        
        });        
        Route::group(['middleware' => ['cek_login:Instruktur UPD Prod||Instruktur UPD||Guru Senbud']], function(){
            Route::get('/absenDet/approveAbsen/{id}', [AdminAbsenDet::class, 'approveAbsen'])->name('absenDet.approveAbsen');            
            Route::get('/absenDet/approveIzin/{id}', [AdminAbsenDet::class, 'approveIzin'])->name('absenDet.approveIzin');            
            Route::get('/absenDet/noApprove/{id}', [AdminAbsenDet::class, 'noApprove'])->name('absenDet.noApprove'); 
            Route::post('/absenDet/postNoApprove/{id}', [AdminAbsenDet::class, 'postNoApprove'])->name('absenDet.postNoApprove');            
            Route::resource('absen', AdminAbsen::class);            
            Route::resource('siswa', AdminSiswa::class);                   
        });        
        Route::get('/', function () {
            return view('admin.layout.dashboard');
        });            
        
        
    });
    
    Route::get('logout', [AdminLogin::class, 'logout'])->name('logout');
    Route::post('logged_in', [AdminLogin::class, 'authenticate'])->name('logged_in');
    Route::get('login', [AdminLogin::class, 'index'])->name('login');
});







