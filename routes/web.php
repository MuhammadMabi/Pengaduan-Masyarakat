<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('getkabupaten', 'IndoRegionController@getkabupaten')->name('getkabupaten');
Route::post('getkecamatan', 'IndoRegionController@getkecamatan')->name('getkecamatan');
Route::post('getdesa', 'IndoRegionController@getdesa')->name('getdesa');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', 'DashboardController@index');

    // Profile

    Route::get('profile', 'AuthController@profile')->name('profile');
    
    // Pengaduan

    Route::prefix('pengaduan')->group(function () {
        Route::get('/', 'PengaduanController@index')->name('pengaduan');
        Route::get('/create', 'PengaduanController@create');
        Route::get('/show/{id}', 'PengaduanController@show')->name('pengaduan.show');
        Route::get('/edit/{id}', 'PengaduanController@edit');
        Route::post('/createOrUpdate', 'PengaduanController@createOrUpdate')->name('pengaduan.createOrUpdate');
        // Route::post('/createOrUpdate', 'PengaduanController@createOrUpdate');
        Route::put('/update/{id}', 'PengaduanController@update');
        Route::delete('/destroy/{id}', 'PengaduanController@destroy');
    });

    // Tanggapan

    Route::prefix('tanggapan')->group(function () {
        Route::get('/', 'TanggapanController@index')->name('tanggapan');
        Route::get('/create', 'TanggapanController@create');
        Route::get('/show/{id}', 'TanggapanController@show');
        Route::get('/edit/{id}', 'TanggapanController@edit');
        Route::post('/store', 'TanggapanController@store');
        Route::post('/createOrUpdate', 'TanggapanController@createOrUpdate')->name('tanggapan.createOrUpdate');
        Route::put('/update/{id}', 'TanggapanController@update');
        Route::delete('/destroy/{id}', 'TanggapanController@destroy');
    });

});


