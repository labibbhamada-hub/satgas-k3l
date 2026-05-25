<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login_proses']);
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth');

Route::get('perbarui-profile', [\App\Http\Controllers\AuthController::class, 'perbarui_profile'])->middleware('auth');
Route::post('perbarui-profile', [\App\Http\Controllers\AuthController::class, 'perbarui_profile_proses'])->middleware('auth');

Route::get('perbarui-password', [\App\Http\Controllers\AuthController::class, 'perbarui_password'])->middleware('auth');
Route::post('perbarui-password', [\App\Http\Controllers\AuthController::class, 'perbarui_password_proses'])->middleware('auth');

// Route::get('admin/index', function () {
//     return view('admin.index');
// });

Route::middleware('satgas')->prefix('satgas')->group(function () {
    Route::get('/', [\App\Http\Controllers\Satgas\HomeController::class, 'index']);

    Route::resource('laporan', \App\Http\Controllers\Satgas\LaporanController::class);
});

Route::middleware('instansi')->prefix('instansi')->group(function () {
    Route::get('/', [\App\Http\Controllers\Instansi\HomeController::class, 'index']);

    Route::resource('laporan', \App\Http\Controllers\Instansi\LaporanController::class);
});

Route::get('laporan-buat', function () {
    return view('laporan-buat');
});

Route::get('laporan-daftar', function () {
    return view('laporan-daftar');
});

Route::get('risiko', function () {
    return view('risiko');
});

Route::get('edukasi', function () {
    return view('edukasi');
});

Route::get('simulasi', function () {
    return view('simulasi');
});

Route::get('limbah', function () {
    return view('limbah');
});

Route::get('audit', function () {
    return view('audit');
});
