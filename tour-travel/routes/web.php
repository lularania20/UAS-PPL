<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KategoriWisataController;
use App\Http\Controllers\admin\PaketWisataController;
use App\Http\Controllers\admin\WisataController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\PelangganController;
use App\Http\Controllers\customer\CustomerController;

Route::get('/', [CustomerController::class, 'index'])->name('customer.index');

Route::group([
    'prefix' => '/admin',
], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/action', [LoginController::class, 'action'])->name('login.action');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/kategori-wisata', [KategoriWisataController::class, 'index'])->name('admin.kategori-wisata');
    Route::get('/kategori-wisata/detail/{id}', [KategoriWisataController::class, 'show'])->name('admin.kategori-wisata.detail');
    Route::get('/kategori-wisata/add', [KategoriWisataController::class, 'add'])->name('admin.kategori-wisata.add');
    Route::post('/kategori-wisata/save', [KategoriWisataController::class, 'store'])->name('admin.kategori-wisata.save');
    Route::get('/kategori-wisata/edit/{id}', [KategoriWisataController::class, 'edit'])->name('admin.kategori-wisata.edit');
    Route::post('/kategori-wisata/update/{id}', [KategoriWisataController::class, 'update'])->name('admin.kategori-wisata.update');
    Route::get('/kategori-wisata/delete/{id}', [KategoriWisataController::class, 'destroy'])->name('admin.kategori-wisata.delete');

    Route::get('/wisata', [WisataController::class, 'index'])->name('admin.wisata.index');
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
    Route::get('/transaksi/approve', [TransaksiController::class, 'updateStatus'])->name('admin.transaksi.approve');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan');
    Route::get('/pelanggan/detail/{id}', [PelangganController::class, 'show'])->name('admin.pelanggan.detail');
    Route::get('/pelanggan/add', [PelangganController::class, 'add'])->name('admin.pelanggan.add');
    Route::post('/pelanggan/save', [PelangganController::class, 'store'])->name('admin.pelanggan.save');
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
    Route::post('/pelanggan/update/{id}', [PelangganController::class, 'update'])->name('admin.pelanggan.update');
    Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'destroy'])->name('admin.pelanggan.delete');
});

Route::group([
    'prefix' => '/customer',
], function () {
    Route::get('/home', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/package', [CustomerController::class, 'package'])->name('customer.package');
    Route::get('/destination', [CustomerController::class, 'destination'])->name('customer.destination');
    Route::get('/package-detail/{id}', [CustomerController::class, 'packageDetail'])->name('customer.packageDetail');
    Route::get('/destination-detail', [CustomerController::class, 'destinationDetail'])->name('customer.destinationDetail');
    Route::get('/checkout', [CustomerController::class, 'checkout'])->name('customer.checkout');
    Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
    Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
});