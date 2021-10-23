<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

// auth middleware
Route::middleware('auth')->group(function () {
    Route::get('account/password','Account\PasswordController@edit')->name('password.edit');
    Route::patch('account/password','Account\PasswordController@update')->name('password.edit');
});

// Route::get('account/password','Account\PasswordController@edit')->name('password.edit');
// Route::patch('account/password','Account\PasswordController@update')->name('password.edit');

// Route::group(['middleware' => 'auth'], function (){
//     Route::get('/home', 'HomeController@index')->name('home');
//     Route::view('watch-the-movie', 'movie')->middleware('verified');
//     Route::get('/produk', 'produk@index')->name("produk");
// });
