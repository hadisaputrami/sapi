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
    Route::get('user', 'UserAPIController@getAuthUser');
    Route::resource('users', 'UserAPIController',['except' => [
        'create','show','update'
    ]]);

    Route::get('users/show','UserAPIController@show');
    Route::post('users/update','UserAPIController@update');
    Route::post('users/password','UserAPIController@changePassword');
    Route::post('token_device','UserAPIController@storeTokenDevice');
});
Route::post('users','UserAPIController@store');
Route::post('token','AuthenticateAPIController@authenticate');
Route::post('reset_password', 'UserAPIController@resetPassword');


Route::resource('ternaks', 'TernakAPIController');

Route::resource('paket_investasis', 'PaketInvestasiAPIController');

Route::resource('ternak_investasis', 'TernakInvestasiAPIController');

Route::resource('agamas', 'AgamaAPIController');

Route::resource('biodatas', 'BiodataAPIController');

Route::resource('konfirmasi_investors', 'KonfirmasiInvestorAPIController');

Route::resource('konfirmasi_investors', 'KonfirmasiInvestorAPIController');

Route::resource('konfirmasi_investors', 'KonfirmasiInvestorAPIController');

Route::resource('paket_investasis', 'PaketInvestasiAPIController');

Route::resource('transaksi_investasis', 'TransaksiInvestasiAPIController');

Route::resource('investor_has_transaksi_investasis', 'InvestorHasTransaksiInvestasiAPIController');