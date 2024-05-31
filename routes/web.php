<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/kritiksarans', \App\Http\Controllers\KritiksaranController::class);
Route::resource('/pengaduans', \App\Http\Controllers\PengaduanController::class);