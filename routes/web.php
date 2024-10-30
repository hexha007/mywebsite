<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\admin\KompetensiController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\DownloadController;

use App\Http\Controllers\admin\DivisiController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\AlbumController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SambutanController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\Auth\LoginController;



use App\Http\Controllers\homecontroller;


// front
Route::get('/', [homecontroller::class,'index'])->name('home');
Route::get('download', [homecontroller::class,'download'])->name('download');
Route::get('gallery', [homecontroller::class,'gallery'])->name('gallery');
Route::get('profil', [homecontroller::class,'profil'])->name('profil');
Route::get('news', [homecontroller::class,'news'])->name('news');
route::post('newssearch',[homecontroller::class,'newsearch'])->name('news.search');
route::get('newskategori/{uid}',[homecontroller::class,'kategori'])->name('news.kategori');
route::get('detailnews/{uid}',[homecontroller::class,'detail_news'])->name('news.detail');
route::get('newsarchive/{date}',[homecontroller::class,'archive'])->name('news.archive');
route::get('newtag/{id}',[homecontroller::class,'tag'])->name('news.tag');
Route::get('divisi/{uid}', [homecontroller::class,'divisi'])->name('divisi');
Route::get('kompetensi/{uid}', [homecontroller::class,'kompetensi'])->name('kompetensi');

// front


// Menampilkan form login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['role:admin']], function () {
// Proses logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('adminsambutan', SambutanController::class);
Route::resource('suggestions', SuggestionController::class);
Route::resource('adminusers', UserController::class);
Route::resource('adminalbums', AlbumController::class);
route::get('dashboard',[dashboard::class,'index'])->name('dashboard');
Route::resource('adminberita', BeritaController::class);
Route::resource('admindivisis', DivisiController::class);
Route::resource('admindownload', DownloadController::class);
Route::resource('admingallerys', GalleryController::class);
Route::resource('adminkategoris', KategoriController::class);
Route::resource('adminkompetensi', KompetensiController::class);
Route::resource('admintags', TagController::class);
Route::resource('adminpegawai', PegawaiController::class);
Route::get('adminprofil', [ProfilController::class, 'index'])->name('adminprofil.index');
Route::get('adminprofil/edit', [ProfilController::class, 'edit'])->name('adminprofil.edit');
Route::put('adminprofil', [ProfilController::class, 'update'])->name('adminprofil.update');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('adminberita', BeritaController::class);
});

Route::fallback(function () {
    return view('error.404');
});