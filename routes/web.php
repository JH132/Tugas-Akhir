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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword; 
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;




            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	
Route::controller(AuthController::class)->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
	// Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	// Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.save');
	Route::get('register/anggota',  [AuthController::class,'registerAnggota'])->name('register.anggota');
	Route::post('register/anggota', [AnggotaController::class,'store2'])->name('save.anggota');
    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::post('/biodata/save', [BiodataController::class, 'store'])->name('biodata.save');

	Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

	// Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
	Route::get('/profile', [ProfileController::class, 'show'])->name('home.profile');


	// Route::get('/home.index', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');


	// Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	// Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	// Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('/anggota', [AnggotaController::class, 'index'])->name('angggota');
	Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');

	Route::get('/home/detail', [HomeController::class, 'detail'])->name('home.detail');
	Route::get('/anggota/lihatPinjam', [AnggotaController::class, 'lihatPinjam'])->name('anggota.lihatPinjam');
	Route::get('/anggota/createPeminjaman', [AnggotaController::class, 'createPeminjaman'])->name('anggota.createPeminjaman');

	
});

// Route::get('/home/buku', [BukuController::class, 'index'])->name('home.buku');
// Route::get('/anggota/createPeminjaman', [AnggotaController::class, 'createPeminjaman'])->name('anggota.createPeminjaman');
// Route::post('/anggota', [AnggotaController::class, 'storePeminjaman'])->name('anggota.storePeminjaman');
// Route::get('/anggota/lihatPinjam', [AnggotaController::class, 'lihatPinjam'])->name('anggota.lihatPinjam');

// Route::get('/anggota', [AnggotaController::class, 'index'])->name('angggota');
// Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');

Route::middleware(['auth', 'status'])->group(function () {
	//dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
	
	//CRUD buku
	Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
	Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
	Route::delete('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.delete');
	Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
	Route::get('/buku/{id_buku}', [BukuController::class, 'detail'])->name('buku.detail');
	Route::get('/buku/{id_buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
	Route::put('/buku/{id_buku}', [BukuController::class, 'update'])->name('buku.update');
	// Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');


	//CRUD peminjaman
	Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
	Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
	// Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
	Route::post('/peminjaman/update-status', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
	Route::get('/peminjaman/{id_peminjaman}', [PeminjamanController::class, 'detail'])->name('peminjaman.detail');
	Route::delete('/peminjaman/{id_peminjaman}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');
	Route::get('/peminjaman/{id_peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
	Route::put('/peminjaman/{id_peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
	Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
	
	//CRUD anggota
	Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
	Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
	Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
	Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota.delete');
	// Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
	Route::get('/anggota/{id_anggota}', [AnggotaController::class, 'detail'])->name('anggota.detail');
	Route::get('/anggota/{id_anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
	Route::put('/anggota/{id_anggota}', [AnggotaController::class, 'update'])->name('anggota.update');

});


