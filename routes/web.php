<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\GuruController;


Route::get('/', function () {
    return view('login');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticating'])->name('authenticating');



// Dashboard Routes
Route::get('/dashboardadmin', function () {
    return view('admin.dashboard');
});
Route::get('/dashboardguru', function () {
    return view('guru.dashboard');
});
Route::get('/dashboardmurid', function () {
    return view('murid.dashboard');
});

Route::get('/inputjadwal', function () {
    return view('admin.inputjadwal');
});
Route::get('/menuinputjadwal', function () {
    return view('admin.inputjadwal');
})->name('admin.menuinputjadwal');

Route::get('/modedaftar', function () {
    return view('admin.modedaftar');
});


//PUNYA ADMIN
//Input Jadwal Guru
Route::get('/inputjadwalguru', [JadwalController::class, 'index'])->name('jadwal.index');

//buat jadwal guru
Route::get('/jadwal/guru/create', [JadwalController::class, 'create'])->name('jadwal.create');

// store data guru
Route::post('/jadwal/guru/store', [JadwalController::class, 'store'])->name('jadwal.store');

//Hapus Data guru
Route::delete('/jadwal/guru/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
Route::get('/jadwal/guru', [JadwalController::class, 'index'])->name('jadwal.index');

//Edit data guru
Route::get('/jadwal/guru{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::put('/jadwal/guru/{id}', [JadwalController::class, 'update'])->name('jadwal.update');


// Input Jadwal Murid 
Route::get('/inputjadwalmurid', [JadwalController::class, 'indexJadwalMurid'])->name('jadwal.indexJadwalMurid');

//buat jadwal murid
Route::get('/jadwal/murid/create', [JadwalController::class, 'createJadwalMurid'])->name('jadwal.createJadwalMurid');

//simpan data murid
Route::post('/jadwal/murid/store', [JadwalController::class, 'storeJadwalMurid'])->name('jadwal.storeJadwalMurid');

//Hapus Data murid
Route::delete('/jadwal/murid/{id}', [JadwalController::class, 'destroyJadwalMurid'])->name('jadwal.destroyJadwalMurid');
Route::get('/jadwal/murid', [JadwalController::class, 'indexJadwalMurid'])->name('jadwal.indexJadwalMurid');

//Edit data murid
Route::get('/jadwal/murid/{id}/edit', [JadwalController::class, 'editJadwalMurid'])->name('jadwal.editJadwalMurid');
Route::put('/jadwal/murid/{id}', [JadwalController::class, 'updateJadwalMurid'])->name('jadwal.updateJadwalMurid');


Route::post('/jadwal/submit', [JadwalController::class, 'submitData'])->name('jadwal.submit');

// Remove duplicate inputjadwalmurid view route
Route::get('/inputnilai', [NilaiController::class, 'index'])->name('nilai.index');

Route::get('/menuinputnilai', function () {
    return view('admin.inputnilai');
})->name('admin.menuinputnilai');


Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');

// store data guru
Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');

//Hapus Data guru
Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');

//Edit data guru
Route::get('/nilai{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nliai.update');



Route::post('/daftar', [DaftarController::class, 'store'])->name('daftar.store');



//PUNYA GURU

// Guru Dashboard Route
Route::get('/jadwalmengajar', [JadwalController::class, 'showJadwalGuru'])->name('guru.jadwalmengajar');

Route::get('/rekapnilai', [NilaiController::class, 'rekapNilai'])->name('rekapnilai');

Route::get('/presensimurid', [GuruController::class, 'showPresensi'])->name('guru.presensimurid');



//PUNYA MURID
Route::get('/jadwalpelajaran', [JadwalController::class, 'showJadwalMurid'])->name('murid.jadwalpelajaran');
Route::get('/nilai', [NilaiController::class, 'showNilai'])->name('murid.nilai');
Route::get('/presensi', [GuruController::class, 'lihatPresensi'])->name('murid.presensi');



