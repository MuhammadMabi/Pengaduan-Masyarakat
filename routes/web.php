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
