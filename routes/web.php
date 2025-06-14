<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/kendaraan/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
Route::get('/search', [PenggunaController::class, 'search'])->name('pengguna.search');
Route::get('/about', function() { return view('pengguna.about'); })->name('pengguna.about');
Route::get('/faq', function() { return view('pengguna.faq'); })->name('pengguna.faq');
Route::get('/blog', function() { return view('pengguna.blog-post'); })->name('pengguna.blog');

// Login & Register
Route::get('/login', [PenggunaController::class, 'loginForm'])->name('pengguna.login');
Route::post('/login', [PenggunaController::class, 'login']);
Route::get('/register', [PenggunaController::class, 'registerForm'])->name('pengguna.register');
Route::post('/register', [PenggunaController::class, 'register']);
Route::post('/logout', [PenggunaController::class, 'logout'])->name('pengguna.logout');

// Sewa
Route::get('/sewa/{id}', [PenggunaController::class, 'sewaForm'])->name('pengguna.sewaForm');
Route::post('/sewa/{id}', [PenggunaController::class, 'sewa'])->name('pengguna.sewa');

Route::get('/riwayat', [PenggunaController::class, 'riwayat'])->name('pengguna.riwayat');