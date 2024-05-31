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
    return view('tambahpengaduan', ['title' => 'Tambah Pengaduan']);
});

Route::get('/tambahkritiksaran', function () {
    return view('tambahkritiksaran', ['title' => 'Tambah Kritik Saran']);
});

Route::get('/admin/home', function () {
    return view('/admin/home', ['title' => 'Home Admin']);
});

Route::get('/admin/pengaduan', function () {
    return view('/admin/pengaduan', ['title' => 'Pengaduan Admin']);
});


Route::get('/admin/kritiksaran', function () {
    return view('/admin/kritiksaran', ['title' => 'Kritik Saran Admin']);
});

Route::get('/admin/akun', function () {
    return view('/admin/akun', ['title' => 'Akun Admin']);
});

Route::get('/admin/mahasiswa', function () {
    return view('/admin/mahasiswa', ['title' => 'Data Mahasiswa Admin']);
});
