<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(MatkulController::class)->group(function () {
    Route::get('/insert_mk', 'insert');
    Route::get('/select_mk', 'select');
    Route::get('/update_mk', 'update');
    Route::get('/delete_mk', 'delete');
});

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/insert_mhs', 'insert');
    Route::get('/select_mhs', 'select');
    Route::get('/update_mhs', 'update');
    Route::get('/delete_mhs', 'delete');
});

Route::controller(DosenController::class)->group(function () {
    Route::get('/insert_dsn', 'insert');
    Route::get('/select_dsn', 'select');
    Route::get('/update_dsn', 'update');
    Route::get('/delete_dsn', 'delete');
});


Route::get('/', function () {
    $dsn = [
    'Arip Solehudin M.Kom',
    'Agung Susilo Yuda Irawan M.Kom',
    'Aji Primajaya M.Kom',
    'Betha Nurina Sari M.Kom',
    'Carudin M.Kom',
    'Garno M.Kom',
    'M. Jajuli M.Si',
    'Purwantoro M.Kom',
    'Siska M.Kom',
    'Susilawati M.Si',
    ];
    return view('dosen')->with('dosen',$dsn);
});

Route::get('/matkul', function () {
    $mk = [
        'Cloud Computing',
        'Data Mining',
        'Embedded Intelligent System',
        'Framework',
        'Jaringan Komputer',
        'Kecerdasan Buatan',
        'Keamanan Sistem',
        'Kalkulus',
        'Metode Numerik',
        'Statistika',
        ];
    return view('matkul')->with('matkul',$mk);
});

Route::get('/mahasiswa', function () {
    $mhs = [
        'Nabila Aulia Rahmah',
        'Nabila Khairunnisa',
        'Octavia Salwa',
        'Putri Rizkika',
        'Rayhan Putra',
        'Radika Tripena Lubis',
        'Rifky Al-Farezal',
        'Risa Adelia',
        'Rizal Fahmi Alifa',
        'Sopiatul Ulum',
        ];
    return view('mahasiswa')->with('mahasiswa',$mhs);
});
