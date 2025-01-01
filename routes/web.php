<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\daftarkontrakan;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home;



Route::middleware([Authenticate::class])->group(function(){
Route::resource('Dasboard', Home::class);
Route::resource('daftar', Daftarkontrakan::class);
Route::resource('penghuni', PenghuniController::class);
Route::resource('laporan', LaporanController::class);

Route::get('/kontrakan/{id}/edit', [daftarkontrakan::class, 'edit'])->name('kontrakan.edit');
Route::put('/kontrakan/{id}', [daftarkontrakan::class, 'update'])->name('kontrakan.update');
Route::delete('/kontrakan/{id}', [daftarkontrakan::class, 'destroy'])->name('kontrakan.destroy');

Route::get('/penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
Route::put('/penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
});

Route::get('/kontrakan/{id}', [Daftarkontrakan::class, 'detail'])->name('detail_daftarkontrakan');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

