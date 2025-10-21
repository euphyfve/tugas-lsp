<?php

use App\Http\Controllers\BandaraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenerbanganController;
use App\Http\Controllers\TransaksiController;
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

Route::middleware('guest')->group(function(){

    // login
    Route::get('login', [HomeController::class, 'login'])->name('login');
    Route::post('ceklogin', [HomeController::class, 'ceklogin'])->name('login.store');

    // regist
    Route::get('register', [HomeController::class, 'register'])->name('regis.index');
    Route::post('cekregister', [HomeController::class, 'cekregister'])->name('regis.store');

});


Route::middleware('auth')->group(function(){

    Route::get('logout', [HomeController::class, 'logout'])->name('logout');

    // khusus home
    Route::prefix('/')->group(function(){
        Route::get('', [HomeController::class, 'index'])->name('home.index');
        Route::get('home', [HomeController::class, 'index'])->name('home.index');
    });


    Route::prefix('history')->group(function(){
        Route::get('', [TransaksiController::class, 'history'])->name('history.index');
        Route::get('detail/{id}', [TransaksiController::class, 'detail'])->name('history.detail');
    });


    // selain user yah
    Route::middleware('selainUser:user')->group(function() {
        // penerbangan cihuy
        Route::prefix('penerbangan')->group(function() {
            Route::get('', [PenerbanganController::class, 'index'])->name('penerbangan.index');
            Route::get('tambah', [PenerbanganController::class, 'create'])->name('penerbangan.create');
            Route::post('store', [PenerbanganController::class, 'store'])->name('penerbangan.store');
            Route::get('del/{id}', [PenerbanganController::class, 'destroy'])->name('penerbangan.delete');
            Route::get('edit/{id}', [PenerbanganController::class, 'edit'])->name('penerbangan.edit');
            Route::put('update', [PenerbanganController::class, 'update'])->name('penerbangan.update');
        });

        // bandara coy
        Route::prefix('bandara')->group(function(){
            Route::get('', [BandaraController::class, 'index'])->name('bandara.index');
            Route::get('tambah', [BandaraController::class, 'create'])->name('bandara.create');
            Route::post('store', [BandaraController::class, 'store'])->name('bandara.store');
            Route::get('del/{id}', [BandaraController::class, 'destroy'])->name('bandara.delete');
            Route::get('edit/{id}', [BandaraController::class, 'edit'])->name('bandara.edit');
            Route::put('update', [BandaraController::class, 'update'])->name('bandara.update');
        });
    });


    //khusus admin biar kece
    Route::middleware('userAkses:admin')->group(function(){
        Route::prefix('confirmation')->group(function(){
            Route::get('', [TransaksiController::class, 'conf_index'])->name('conf.index');
            Route::get('done/{id}', [TransaksiController::class, 'conf_done'])->name('conf.done');
        });
    });
    
    Route::middleware('selainUser:user')->group(function(){
        // dakun
        Route::prefix('dakun')->group(function(){
            Route::get('', [HomeController::class, 'show'])->name('dakun.index');
            Route::get('tambah', [HomeController::class, 'create'])->name('dakun.create');
            Route::post('store', [HomeController::class, 'store'])->name('dakun.store');
            Route::get('del/{id}', [HomeController::class, 'destroy'])->name('dakun.delete');
            Route::get('ganti/{id}', [HomeController::class, 'edit'])->name('dakun.ganti');
            Route::post('change', [HomeController::class, 'update'])->name('dakun.change');
            Route::get('edit/{id}', [HomeController::class, 'editemail'])->name('dakun.edit');
            Route::post('update', [HomeController::class, 'gantiemail'])->name('dakun.update');
        });
    });


    Route::middleware('userAkses:user')->group(function(){
        Route::prefix('transaksi')->group(function(){
            Route::get('', [TransaksiController::class, 'index'])->name('transaksi.index');
            Route::get('pesan/{id}', [TransaksiController::class, 'edit'])->name('transaksi.pesan');
            Route::post('gas', [TransaksiController::class, 'store'])->name('transaksi.gas');
        });

        Route::prefix('checkout')->group(function(){
            Route::get('', [TransaksiController::class, 'cekot'])->name('cekot.index');
            Route::get('refund/{id}', [TransaksiController::class, 'refund'])->name('cekot.delete');
        });
    });


});
