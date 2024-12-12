<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\daftarkontrakan;
use App\Http\Controllers\PenghuniController;



Route::resource('daftar', Daftarkontrakan::class);
Route::resource('penghuni', PenghuniController::class);

