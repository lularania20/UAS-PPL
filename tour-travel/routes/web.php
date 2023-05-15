<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KategoriWisataController;
use App\Http\Controllers\admin\WisataController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
