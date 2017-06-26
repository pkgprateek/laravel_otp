<?php

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
Route::get('/', 'OtpController@index')->name('home');
// Route::get('/verify', 'OtpController@verify')->name('verify');
Route::post('/verify', 'OtpController@verifyotp')->name('verifyotp');
// Route::get('/test', 'OtpController@test')->name('test');
Route::post('/sendotp', 'OtpController@sendotp')->name('sendotp');