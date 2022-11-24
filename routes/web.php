<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('beranda');
// });

Route::get('/', [ArtikelController::class, 'depan']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::resource('datauser', UserController::class);
    Route::get('deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');
    
    Route::resource('profil', ProfilController::class);
    Route::get('deleteprofil{profil}', [ProfilController::class, 'destroy'])->name('deleteprofil');
});

Route::middleware(['auth', 'editor'])->group(function () {
    
    Route::resource('kategori', KategoriController::class);
    Route::get('deletekategori/{kategori}', [KategoriController::class, 'destroy'])->name('deletekategori');

    Route::resource('artikel', ArtikelController::class);
    Route::get('deleteartikel/{artikel}', [ArtikelController::class, 'destroy'])->name('deleteartikel');

});







