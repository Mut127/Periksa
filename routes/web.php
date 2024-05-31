<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/pengaduan', function () {
    return view('pengaduan', ['title' => 'Pengaduan']);
});
Route::get('/kritiksaran', function () {
    return view('kritiksaran', ['title' => 'Kritik dan Saran']);
});


Route::get('/tambahpengaduan', function () {
    return view('tambahpengaduan', ['title' => 'Pengaduan']);
});