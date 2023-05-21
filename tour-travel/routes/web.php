<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KategoriWisataController;
use App\Http\Controllers\admin\PaketWisataController;
use App\Http\Controllers\admin\WisataController;
use App\Http\Controllers\admin\TransaksiController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group([
    'prefix' => '/admin',
], function () {
    Route::get('/kategori-wisata', [KategoriWisataController::class, 'index'])->name('admin.kategori-wisata');
    Route::get('/kategori-wisata/detail/{id}', [KategoriWisataController::class, 'show'])->name('admin.kategori-wisata.detail');
    Route::get('/kategori-wisata/add', [KategoriWisataController::class, 'add'])->name('admin.kategori-wisata.add');
    Route::post('/kategori-wisata/save', [KategoriWisataController::class, 'store'])->name('admin.kategori-wisata.save');
    Route::get('/kategori-wisata/edit/{id}', [KategoriWisataController::class, 'edit'])->name('admin.kategori-wisata.edit');
    Route::post('/kategori-wisata/update/{id}', [KategoriWisataController::class, 'update'])->name('admin.kategori-wisata.update');
    Route::get('/kategori-wisata/delete/{id}', [KategoriWisataController::class, 'destroy'])->name('admin.kategori-wisata.delete');

    Route::get('/wisata', [WisataController::class, 'index'])->name('admin.wisata');
    Route::get('/wisata/detail/{id}', [WisataController::class, 'detail'])->name('admin.wisata.detail');
    Route::get('/wisata/add', [WisataController::class, 'add'])->name('admin.wisata.add');
    Route::post('/wisata/save', [WisataController::class, 'store'])->name('admin.wisata.save');
    Route::get('/wisata/edit/{id}', [WisataController::class, 'edit'])->name('admin.wisata.edit');
    Route::post('/wisata/update/{id}', [WisataController::class, 'update'])->name('admin.wisata.update');
    Route::get('/wisata/delete/{id}', [WisataController::class, 'destroy'])->name('admin.wisata.delete');

    Route::get('/paket-wisata', [PaketWisataController::class, 'index'])->name('admin.paket-wisata');
    Route::get('/paket-wisata/detail/{id}', [PaketWisataController::class, 'detail'])->name('admin.paket-wisata.detail');
    Route::get('/paket-wisata/add', [PaketWisataController::class, 'add'])->name('admin.paket-wisata.add');
    Route::post('/paket-wisata/save', [PaketWisataController::class, 'store'])->name('admin.paket-wisata.save');
    Route::get('/paket-wisata/edit/{id}', [PaketWisataController::class, 'edit'])->name('admin.paket-wisata.edit');
    Route::post('/paket-wisata/update/{id}', [PaketWisataController::class, 'update'])->name('admin.paket-wisata.update');
    Route::get('/paket-wisata/delete/{id}', [PaketWisataController::class, 'destroy'])->name('admin.paket-wisata.delete');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail'])->name('admin.transaksi.detail');
    Route::get('/transaksi/add', [TransaksiController::class, 'add'])->name('admin.transaksi.add');
    Route::post('/transaksi/save', [TransaksiController::class, 'store'])->name('admin.transaksi.save');
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('admin.transaksi.edit');
    Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
    Route::get('/transaksi/delete/{id}', [TransaksiController::class, 'destroy'])->name('admin.transaksi.delete');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
