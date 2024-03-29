<?php

use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\RakKategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SirkulasiController;
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
// Route::get('/hello', function () {
//     return view('blank');
// });
// Route::get('/tabel', function () {
//     return view('tabel');
// });

//kelola pengunjung
Route::get('/pengunjung',[PengunjungController::class,'listPengunjung'])->name('pengunjung.index');
Route::get('/buku-pengunjung',[PengunjungController::class,'addPengunjung'])->name('pengunjung.create');
Route::post('/tambah-pengunjung',[PengunjungController::class,'storePengunjung'])->name('pengunjung.store');

//kelola rak
Route::get('/rak-buku',[RakKategoriController::class,'listRak'])->name('rak.index');
Route::post('/tambah-rak',[RakKategoriController::class,'addRak'])->name('rak.store');
Route::put('/rak-update/{id}',[RakKategoriController::class,'updateRak'])->name('rak.update');
Route::delete('/rak-delete/{id}',[RakKategoriController::class,'deleteRak'])->name('rak.destroy');


//kelola kategori
Route::get('/kategori-buku',[RakKategoriController::class,'listKategori'])->name('kategori.index');
Route::post('/tambah-kategori',[RakKategoriController::class,'addKategori'])->name('kategori.store');
Route::put('/kategori-update/{id}',[RakKategoriController::class,'updateKategori'])->name('kategori.update');
Route::delete('/kategori-delete/{id}',[RakKategoriController::class,'deleteKategori'])->name('kategori.destroy');

//kelola buku
Route::get('/buku', [BukuController::class,'index'])->name('buku.index');
Route::get('/tambah_buku',[BukuController::class,'create'])->name('buku.create');
Route::post('/tambah_buku/store',[BukuController::class,'store'])->name('buku.store');
Route::get('/buku/info/{id}',[BukuController::class,'info'])->name('buku.info');
Route::get('/buku/edit/{id}',[BukuController::class,'edit'])->name('buku.edit');
Route::put('/buku/update/{id}',[BukuController::class,'update'])->name('buku.update');
Route::delete('/buku/delete/{id}',[BukuController::class, 'destroy'])->name('buku.destroy');

// kelola sirkulasi
Route::get('/peminjaman',[SirkulasiController::class,'pinjam'])->name('sirkulasi.pinjam');
Route::get('/pengembalian',[SirkulasiController::class,'kembali'])->name('sirkulasi.kembali');
Route::get('/tambah-pinjam',[SirkulasiController::class,'create'])->name('sirkulasi.tambah');
