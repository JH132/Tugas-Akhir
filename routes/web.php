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


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword; 
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;


Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::get('/anggota/createPeminjaman', [AnggotaController::class, 'createPeminjaman'])->name('anggota.createPeminjaman');
Route::post('/anggota', [AnggotaController::class, 'storePeminjaman'])->name('anggota.storePeminjaman');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota.delete');
// Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/lihatPinjam', [AnggotaController::class, 'lihatPinjam'])->name('anggota.lihatPinjam');
Route::get('/anggota/{id_anggota}', [AnggotaController::class, 'detail'])->name('anggota.detail');
Route::get('/anggota/{id_anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id_anggota}', [AnggotaController::class, 'update'])->name('anggota.update');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
	
Route::group(['middleware' => 'auth'], function () {
	// Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	// Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	// Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	// Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	// Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::get('/anggota', [AnggotaController::class, 'index'])->name('angggota');
	Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
	
});

// Route::get('/anggota', [AnggotaController::class, 'index'])->name('angggota');
// Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');

Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.delete');
// Route::get('/buku', 'BukuController@index')->name('buku.index');
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/{id_buku}', [BukuController::class, 'detail'])->name('buku.detail');
Route::get('/buku/{id_buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id_buku}', [BukuController::class, 'update'])->name('buku.update');

