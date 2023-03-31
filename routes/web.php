<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use RealRashid\SweetAlert\Facades\Alert;

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
    return view('landingpage');
})->middleware('guest')->name('landingpage');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/verify-user');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('verify-user', function () {
    Alert::success('Success Verify', 'Selamat akun anda sudah terverifikasi!');
    return redirect('dashboard');
})->middleware('auth', 'verified');

Auth::routes();

// Indo Region
Route::post('getkabupaten', 'IndoRegionController@getkabupaten')->name('getkabupaten');
Route::post('getkecamatan', 'IndoRegionController@getkecamatan')->name('getkecamatan');
Route::post('getdesa', 'IndoRegionController@getdesa')->name('getdesa');

Route::delete('hapusakun/{id}', 'AuthController@destroy')->name('hapus.akun');

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Profile
    Route::get('profile', 'AuthController@profile')->name('profile');
    Route::get('changepassword', 'AuthController@index')->name('changepassword');
    Route::post('changepassword', 'AuthController@changePassword')->name('changepassword');
    Route::put('updateprofile/{id}', 'AuthController@update')->name('update.profile');
    

    // Pengaduan
    Route::prefix('pengaduan')->group(function () {
        Route::get('', 'PengaduanController@index')->name('pengaduan');
        Route::get('show/{id}', 'PengaduanController@show')->name('pengaduan.show');
        Route::get('cetak/{id}', 'PengaduanController@cetak')->name('pengaduan.cetak');
        Route::delete('destroy/{id}', 'PengaduanController@destroy');

        Route::middleware(['warga'])->group(function () {
            Route::get('laporan', 'PengaduanController@create')->name('laporan');
            Route::get('edit/{id}', 'PengaduanController@edit');
            Route::post('createOrUpdate', 'PengaduanController@createOrUpdate')->name('pengaduan.createOrUpdate');
            Route::post('uploadimage', 'PengaduanController@uploadimage')->name('upload.image');
            Route::delete('destroyimage/{id}', 'PengaduanController@destroyimage')->name('destroy.image');
        });
    });

    // Protected Route !Warga | Akses untuk Admin & Petugas

    Route::middleware(['petugas'])->group(function () {

        // Kategori
        Route::prefix('kategori')->group(function () {
            Route::get('', 'KategoriController@index')->name('kategori');
            Route::get('edit/{id}', 'KategoriController@edit');
            Route::post('createOrUpdate', 'KategoriController@createOrUpdate')->name('kategori.createOrUpdate');
            Route::delete('destroy/{id}', 'KategoriController@destroy');
        });

        // Tanggapan
        Route::prefix('tanggapan')->group(function () {
            Route::post('/createOrUpdate', 'TanggapanController@createOrUpdate')->name('tanggapan.createOrUpdate');
        });

        // User
        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('user');
            Route::put('/update/{id}', 'UserController@updateRole');
            Route::get('/show/{id}', 'UserController@show');
            Route::delete('/destroy/{id}', 'UserController@destroy');
        });
    
    });

    Route::middleware(['admin'])->group(function () {

        // Cetak Laporan
        Route::get('/laporan', 'PengaduanController@cetakPengaduan')->name('cetak');
        Route::get('/cetakpdf/{tanggal_awal}/{tanggal_akhir}', 'PengaduanController@cetakpdf')->name('cetak.pengaduan');
    });

});
