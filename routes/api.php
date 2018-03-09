<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'jwt.auth'], function () {

});

Route::post('users','UserAPIController@store');
Route::post('token','AuthenticateAPIController@authenticate');
Route::post('reset_password', 'UserAPIController@resetPassword');

Route::resource('transaksi_investasis', 'TransaksiInvestasiAPIController');

Route::resource('ternaks', 'TernakAPIController');
Route::resource('paket_investasis', 'PaketInvestasiAPIController');

Route::resource('ternak_investasis', 'TernakInvestasiAPIController');