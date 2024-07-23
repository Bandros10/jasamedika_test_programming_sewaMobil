<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\select2Controller;
use App\Http\Controllers\DashboarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/registerpost',[AuthController::class,'registerpost'])->name('register.post');
Route::post('/loginpost',[AuthController::class,'loginpost'])->name('login.post');
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/dashoard',[DashboarController::class,'index'])->name('dashboard.index');

Route::middleware(['auth','CheckRole:admin,client'])->group(function () {
    Route::get('/sewa/{id}',[SewaController::class,'create'])->name('sewa.create');
    Route::post('/sewa/keluar/{id}',[SewaController::class,'keluar'])->name('sewa.keluar');
    Route::get('/sewa/pengembalian/{id}',[SewaController::class,'pengembalian'])->name('sewa.pengembalian');
    Route::post('/sewa/pengembalian/store',[SewaController::class,'pengembalian_store'])->name('sewa.pengembalian_store');

    Route::get('/boking/keluar/{id}',[DashboarController::class,'index_keluar'])->name('boking.keluar_index');
    Route::get('/boking/masuk/{id}',[DashboarController::class,'index_masuk'])->name('boking.masuk_index');
});

Route::middleware(['auth','CheckRole:admin'])->group(function () {

    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/tambah',[UserController::class,'tambah'])->name('user.tambah');
    Route::post('/user/create',[UserController::class,'create'])->name('user.create');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
    Route::post('/user/edit/{id}/update',[UserController::class,'update'])->name('user.update');

    Route::get('/mobil',[MobilController::class,'index'])->name('mobil.index');
    Route::get('/mobil/tambah',[MobilController::class,'tambah'])->name('mobil.tambah');
    Route::post('/mobil/create',[MobilController::class,'create'])->name('mobil.create');
    Route::get('/mobil/edit/{id}',[MobilController::class,'edit'])->name('mobil.edit');
    Route::post('/mobil/edit/{id}/update',[MobilController::class,'update'])->name('mobil.update');
    Route::get('/mobil/delete/{id}',[MobilController::class,'delete'])->name('mobil.delete');

    Route::get('/histori',[HistoryController::class,'index'])->name('histori.index');
});

Route::get('/select/mobil',[select2Controller::class,'mobilSelect'])->name('select2.mobil');
Route::get('/select/mobil_masuk',[select2Controller::class,'mobilmasuk'])->name('select2.mobil_masuk');
Route::get('/select/tarifmob/{plat}',[select2Controller::class,'tarif'])->name('select2.tarifmob');

