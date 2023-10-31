<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SewaaulaController;
use App\Http\Controllers\SewakantinController;
use App\Http\Controllers\TransaksiaulaController;
use App\Http\Controllers\TransaksikantinController;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware(['guest'])->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('loginPage');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [LoginController::class, 'registerPage'])->name('registerPage');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        if(Auth::user()->role == 'Admin'){
            return redirect('/admin/dashboard');
        } else if(Auth::user()->role == 'Customer'){
            return redirect('/customer/dashboard');
        }else{
            return redirect('/');
        }
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['role:Admin'])->group(function() {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('adminPage');

        Route::get('/admin/kategori', [KategoriController::class, 'kategoriTampil'])->name('kategoriTampil');
        Route::post('/admin/kategori/tambah', [KategoriController::class, 'kategoriTambah'])->name('kategoriTambah');
        Route::get('/admin/kategori/hapus/{id_ktkantin}', [KategoriController::class, 'kategoriHapus'])->name('kategoriHapus');
        Route::put('/admin/kategori/edit/{id_ktkantin}', [KategoriController::class, 'kategoriEdit'])->name('kategoriEdit');

        Route::get('/admin/aula', [AulaController::class, 'aulaTampil'])->name('aulaTampil');
        Route::post('/admin/aula/tambah', [AulaController::class, 'aulaTambah'])->name('aulaTambah');
        Route::get('/admin/aula/hapus/{id_aula}', [AulaController::class, 'aulahapus'])->name('aulaHapus');
        Route::put('/admin/aula/edit/{id_aula}', [AulaController::class, 'aulaEdit'])->name('aulaEdit');

        Route::get('/admin/kantin', [KantinController::class, 'kantinTampil'])->name('kantinTampil');
        Route::post('/admin/kantin/tambah',[KantinController::class, 'kantinTambah'])->name('kantinTambah');
        Route::get('/admin/kantin/hapus/{id_kantin}',[KantinController::class, 'kantinHapus'])->name('kantinHapus');
        Route::put('/admin/kantin/edit/{id_kantin}', [KantinController::class, 'kantinEdit'])->name('kantinEdit');
    });

    Route::middleware(['role:Customer'])->group(function() {
        Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customerPage');

        Route::get('/customer/kantin', [SewakantinController::class, 'kantinTampil'])->name('sewaKantin');
        Route::post('/customer/kantin/tambah', [SewakantinController::class, 'kantinTambah'])->name('sewakantinTambah');

        Route::get('/customer/aula', [SewaaulaController::class, 'aulaTampil'])->name('sewaAula');
        Route::post('/customer/aula/tambah', [SewaaulaController::class, 'aulaTambah'])->name('sewaaulaTambah');

        Route::get('/customer/transaksi/kantin', [TransaksikantinController::class, 'kantinTampil'])->name('transaksiKantin');
        Route::get('/customer/transaksi/kantin/hapus/{id_kantin}', [TransaksikantinController::class, 'kantinHapus'])->name('transaksikantinHapus');

        Route::get('/customer/transaksi/aula', [TransaksiaulaController::class, 'aulaTampil'])->name('transaksiAula');
        Route::get('/customer/transaksi/aula/hapus/{id_aula}', [TransaksiaulaController::class, 'aulaHapus'])->name('transaksiaulaHapus');
    });
});

Route::get('/errorhandling','ErrorController@index');
