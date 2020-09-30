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
    return view('index');
});

// Berita
Route::get('/berita', 'BeritaController@index')->name('berita');


// API KOTA DAN KECAMATAN
Route::get('/api/city/', 'RelawanController@getCity');
Route::get('/api/district/', 'RelawanController@getDistrict');


// ADMIN 
Route::group(['prefix' => 'gbb'], function () {
    Route::post('store-login', 'Admin\LoginController@store')->name('store-login');
    Route::get('login', 'Admin\LoginController@create')->name('login-admin');
    Route::get('register', 'Admin\RegisterController@create')->name('register-admin');
    Route::post('store-register', 'Admin\RegisterController@store')->name('store-register');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
        Route::get('logout', 'Admin\LoginController@logout')->name('logout-admin');

        // BERITA
        Route::group(['prefix' => 'berita'], function () { 
        Route::get('table', 'Admin\BeritaController@table')->name('table-berita-admin');
        Route::get('create', 'Admin\BeritaController@create')->name('create-berita-admin');
        Route::post('store', 'Admin\BeritaController@store')->name('store-berita-admin');
        Route::post('confirm/{id}', 'Admin\BeritaController@confirm')->name('confirm-berita');
    });
        // SANGGAR
        Route::group(['prefix' => 'sanggar'], function (){
            Route::get('create', 'Admin\SanggarController@create')->name('create-sanggar');
            Route::get('index', 'Admin\SanggarController@index')->name('index-sanggar');
        });

        // ANGGOTA DEWAN
        Route::group(['prefix' => 'anggota-dewan'], function (){
            Route::get('create', 'Admin\AnggotaDewanController@create')->name('create-anggota-dewan');
            Route::get('index', 'Admin\AnggotaDewanController@index')->name('index-dewan');
        });
        // RELAWAN
        Route::group(['prefix' => 'relawan'], function () {
            Route::get('create', 'Admin\DataRelawanController@create')->name('create-data-relawan');
            Route::get('index', 'Admin\DataRelawanController@index')->name('index-data-relawan');
            Route::get('edit/{id}', 'Admin\DataRelawanController@edit')->name('edit-relawan');
            Route::post('store', 'Admin\DataRelawanController@store')->name('store-data-relawan');
            Route::post('update/{id}', 'Admin\DataRelawanController@update')->name('update-relawan');
            Route::post('delete/{id}', 'Admin\DataRelawanController@destroy')->name('delete-relawan');

            // AKUN USER
            Route::group(['prefix' => 'account'], function () {
                Route::get('/index', 'Admin\DataRelawanController@indexAccount')->name('index-account-relawan');
                Route::get('/create', 'Admin\DataRelawanController@createAccount')->name('create-account-relawan');
                Route::post('/store', 'Admin\DataRelawanController@storeAccount')->name('store-account-relawan');
                Route::get('/edit/{id}', 'Admin\DataRelawanController@editAccount')->name('edit-account-relawan');
                Route::post('/update/{id}', 'Admin\DataRelawanController@updateAccount')->name('update-account-relawan');
                Route::post('/delete/{id}', 'Admin\DataRelawanController@deleteAccount')->name('delete-account-relawan');
            });

            // Jenjang 
            Route::group(['prefix' => 'jenjang'], function () {
                Route::get('/index', 'Admin\DataRelawanController@indexJenjang')->name('index-jenjang-relawan');
                Route::get('/create', 'Admin\DataRelawanController@createJenjang')->name('create-jenjang-relawan');
                Route::get('/edit/{id}', 'Admin\DataRelawanController@editJenjang')->name('edit-jenjang-relawan');
                Route::post('/update/{id}', 'Admin\DataRelawanController@updateJenjang')->name('update-jenjang-relawan');
                Route::post('/delete/{id}', 'Admin\DataRelawanController@deleteJenjang')->name('delete-jenjang-relawan');
                Route::post('/store', 'Admin\DataRelawanController@storeJenjang')->name('store-jenjang-relawan');
            });
        });
    });
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/edit/{id}', 'ProfileUserController@edit')->name('profile-edit');
Route::get('/berita/create', 'BeritaController@create')->name('create-berita');
Route::post('/berita/store', 'BeritaController@store')->name('store-berita');
Route::get('/berita/table', 'BeritaController@table')->name('table-berita');

Route::group(['prefix' => 'relawan', 'middleware' => 'auth'], function () {
    Route::get('/create', 'RelawanController@create')->name('create-relawan');
    Route::post('/store', 'RelawanController@store')->name('store-relawan');
});

Route::group(['prefix' => 'fasilitas', 'middleware' => 'auth'], function () {
    Route::get('/create', 'FasilitasController@create')->name('create-fasilitas');
    Route::post('/store', 'FasilitasController@store')->name('store-fasilitas');
});

Route::group(['prefix' => 'identitas-relawan', 'middleware' => 'auth'], function () {
    Route::get('/create', 'IdentitasRelawanController@create')->name('create-identitas');
    Route::post('/store', 'IdentitasRelawanController@store')->name('store-identitas');
});
