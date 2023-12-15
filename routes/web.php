<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaranganbungaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\LaporanController;

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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegistController::class, 'index']);
Route::post('/register', [RegistController::class, 'store']);

Route::get('/karanganbunga', [KaranganbungaController::class, 'index']);
Route::get('/karanganbunga', [KaranganbungaController::class, 'searchKaranganBunga']);
Route::get('/karanganbunga/{id}', [KaranganbungaController::class, 'show']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/floralrent/login', [AdminController::class, 'loginGuru']);
Route::post('/floralrent/login', [LoginController::class, 'authenticate']);

Route::get('/floralrent/karanganbunga', [AdminController::class, 'displaykaranganbunga']);
Route::get('/floralrent/tambahkaranganbunga', [AdminController::class, 'tambahkaranganbunga']);
Route::post('/floralrent/tambahkaranganbunga', [KaranganbungaController::class, 'store'])->name('karanganbunga.store');
Route::get('/floralrent/editkaranganbunga/{id}', [AdminController::class, 'editkaranganbunga']);
Route::put('/floralrent/update-karanganbunga/{id}', [AdminController::class, 'updatekaranganbunga'])->name('admin.updatekaranganbunga');
Route::delete('/floralrent/delete/{id}', [AdminController::class, 'deletekaranganbunga']);

Route::get('/admin/kategori', [KategoriController::class, 'index']);
Route::get('/admin/kategori/{id}', [KategoriController::class, 'edit']);
Route::put('/admin/updatekategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/admin/deletekategori/{id}', [KategoriController::class, 'delete']);
Route::get('/admin/addkategori', [KategoriController::class, 'create']);
Route::post('/admin/addkategori', [KategoriController::class, 'store'])->name('kategori.store');

Route::get('/admin/anggota', [AnggotaController::class, 'index']);
Route::get('/admin/anggota/{id}', [AnggotaController::class, 'edit']);
Route::put('/admin/updateanggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/admin/deleteanggota/{id}', [AnggotaController::class, 'delete']);
Route::get('/admin/addanggota', [AnggotaController::class, 'create']);
Route::post('/admin/addanggota', [AnggotaController::class, 'store'])->name('anggota.store');

Route::get('/admin/addpenyewaan', [PenyewaanController::class, 'create']);
Route::post('/admin/addpenyewaan', [PenyewaanController::class, 'store'])->name('penyewaan.store');

Route::get('/admin/pengembalian', [PengembalianController::class, 'index']);
Route::post('/admin/pengembalian', [PengembalianController::class, 'store'])->name('pengembalian.store');

Route::get('/admin/inbox', [AdminController::class, 'index']);
Route::put('/admin/inbox/{order}', [AdminController::class, 'update_status']);

Route::get('/admin/setting', [AdminController::class, 'setting']);
Route::put('/admin/setting/{user}', [AdminController::class, 'update']);

// route for user

Route::put('/user/{user}', [UserController::class, 'update']);

Route::get('/user/rent', [PenyewaanController::class, 'userrent']);

Route::get('/user/class', [UserController::class, 'myclass']);

Route::get('/user/addpenyewaan', [PenyewaanController::class, 'userindex']);
Route::post('/user/addpenyewaan', [PenyewaanController::class, 'userstore'])->name('penyewaan.userstore');

Route::get('/user/setting', [UserController::class, 'setting']);
Route::get('/user/setting/{user}', [UserController::class, 'update']);
Route::put('/user/setting/{user}', [UserController::class, 'update']);

Route::get('/cetak-laporan', [LaporanController::class, 'cetak']);
