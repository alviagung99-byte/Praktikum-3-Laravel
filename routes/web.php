<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\SmartEduController;
use App\Http\Controllers\PendaftaranSiswaController;

// ============================================================
// TUGAS 1 — LaporBanjir
// ============================================================
Route::get('/laporbanjir', [LaporBanjirController::class, 'form'])->name('laporbanjir.form');
Route::post('/laporbanjir/kirim', [LaporBanjirController::class, 'kirim'])->name('laporbanjir.kirim');

// ============================================================
// TUGAS 2 — Semua Route SmartEduInclusion
// ============================================================

// Halaman utama / landing
Route::get('/', [SmartEduController::class, 'landing'])->name('home');

// Auth
Route::get('/login', [SmartEduController::class, 'loginForm'])->name('login');

// Dashboard per role
Route::get('/staff-tu/dashboard', [SmartEduController::class, 'staffDashboard'])->name('staff-tu.dashboard');
Route::get('/guru/dashboard', [SmartEduController::class, 'guruDashboard'])->name('guru.dashboard');
Route::get('/siswa/dashboard', [SmartEduController::class, 'siswaDashboard'])->name('siswa.dashboard');
Route::get('/orang-tua/dashboard', [SmartEduController::class, 'orangTuaDashboard'])->name('orang-tua.dashboard');

// Staff TU — Manajemen Pengguna
Route::get('/staff-tu/pengguna', [SmartEduController::class, 'pengguna'])->name('staff-tu.pengguna');

// Staff TU — Manajemen Kelas
Route::get('/staff-tu/kelas', [SmartEduController::class, 'kelas'])->name('staff-tu.kelas');

// Staff TU — Manajemen Mata Pelajaran
Route::get('/staff-tu/mapel', [SmartEduController::class, 'mapel'])->name('staff-tu.mapel');

// Siswa — Materi
Route::get('/siswa/materi', [SmartEduController::class, 'materi'])->name('siswa.materi');
Route::get('/siswa/materi/{kodeMateri}', [SmartEduController::class, 'detailMateri'])->name('siswa.materi.detail');

// Siswa — Latihan
Route::get('/siswa/latihan', [SmartEduController::class, 'latihan'])->name('siswa.latihan');
Route::get('/siswa/latihan/{kodeMateri}', [SmartEduController::class, 'detailLatihan'])->name('siswa.latihan.detail');

// ============================================================
// TUGAS 3 — Pendaftaran Siswa (tanpa database)
// ============================================================
Route::get('/pendaftaran', [PendaftaranSiswaController::class, 'form'])->name('pendaftaran.form');
Route::post('/pendaftaran/proses', [PendaftaranSiswaController::class, 'proses'])->name('pendaftaran.proses');
