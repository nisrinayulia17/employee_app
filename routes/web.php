<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home'); // Halaman Beranda
})->name('home');

Route::get('/list', [KaryawanController::class, 'index']); //halaman list karyawan

Route::get('/add', function () {
    return view('form_add'); //halaman form
});

Route::post('/add_form', [KaryawanController::class, 'store']); //menambah data
    