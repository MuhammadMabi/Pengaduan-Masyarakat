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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['guest'])->group(function () {
});

Route::get('/', function () {
    return view('landingpage');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('getkabupaten', 'IndoRegionController@getkabupaten')->name('getkabupaten');
Route::post('getkecamatan', 'IndoRegionController@getkecamatan')->name('getkecamatan');
Route::post('getdesa', 'IndoRegionController@getdesa')->name('getdesa');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Profile

    Route::get('profile', 'AuthController@profile')->name('profile');
    Route::get('changepassword', 'AuthController@index')->name('changepassword');
    Route::post('changepassword', 'AuthController@changePassword')->name('changepassword');
    Route::put('updateprofile/{id}', 'AuthController@update')->name('update.profile');
    Route::delete('hapusakun/{id}', 'AuthController@destroy')->name('hapus.akun');
    
    Route::post('uploadimage', 'PengaduanController@uploadimage')->name('upload.image');
    Route::delete('destroyimage/{id}', 'PengaduanController@destroyimage')->name('destroy.image');
    
    // Pengaduan
    
    Route::prefix('pengaduan')->group(function () {
        Route::get('/', 'PengaduanController@index')->name('pengaduan');
        Route::get('/cetak', 'PengaduanController@cetakPengaduan')->name('cetak.pengaduan');
        Route::get('/create', 'PengaduanController@create')->middleware('warga');
        Route::get('/show/{id}', 'PengaduanController@show')->name('pengaduan.show');
        Route::get('/edit/{id}', 'PengaduanController@edit')->middleware('warga');
        Route::post('/createOrUpdate', 'PengaduanController@createOrUpdate')->name('pengaduan.createOrUpdate');
        Route::delete('/destroy/{id}', 'PengaduanController@destroy');
    });

    // Protected Route !Warga

    Route::middleware(['petugas'])->group(function () {

        // Tanggapan

        Route::prefix('tanggapan')->group(function () {
            Route::post('/createOrUpdate', 'TanggapanController@createOrUpdate')->name('tanggapan.createOrUpdate');
            // Route::get('/', 'TanggapanController@index')->name('tanggapan');
            // Route::delete('/destroy/{id}', 'TanggapanController@destroy');
        });

        // User

        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('user');
            Route::put('/update/{id}', 'UserController@update');
            Route::get('/show/{id}', 'UserController@show');
            Route::delete('/destroy/{id}', 'UserController@destroy');
        });

    });

});
