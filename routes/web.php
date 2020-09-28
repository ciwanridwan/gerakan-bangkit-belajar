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

Route::get('/api/city/', 'RelawanController@getCity');
Route::get('/api/district/', 'RelawanController@getDistrict');

// ADMIN 
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'relawan'], function () {
        Route::get('create', 'Admin\DataRelawanController@create')->name('create-data-relawan');
        Route::get('index', 'Admin\DataRelawanController@index')->name('index-data-relawan');
        Route::group(['prefix' => 'account'], function () {
            Route::get('/index', 'Admin\DataRelawanController@indexAccount')->name('index-account-relawan');
            Route::get('/create', 'Admin\DataRelawanController@createAccount')->name('create-account-relawan');
            Route::get('/edit/{id}', 'Admin\DataRelawanController@editAccount')->name('edit-account-relawan');
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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/edit/{id}', 'ProfileUserController@edit')->name('profile-edit');

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
