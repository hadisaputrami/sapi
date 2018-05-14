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

Route::resource('investor_has_transaksi_investasis', 'InvestorHasTransaksiInvestasiAPIController');

Route::resource('ternak_investasis', 'TernakInvestasiAPIController');

Route::resource('transaksi_investasis', 'TransaksiInvestasiAPIController');

Route::resource('trans_penj_has_status_penj', 'TransaksiPenjualanHasStatusPenjualanAPIController');

Route::resource('trans_inves_has_status_inves', 'TransInvesHasStatusInvesAPIController');

Route::resource('transaksi_investasis', 'TransaksiInvestasiAPIController');

Route::resource('asuransis', 'AsuransiAPIController');

Route::resource('jenis_pembayarans', 'JenisPembayaranAPIController');

Route::resource('jenis_pembayarans', 'JenisPembayaranAPIController');

Route::resource('investor_has_transaksi_investasis', 'InvestorHasTransaksiInvestasiAPIController');

Route::resource('ternaks', 'TernakAPIController');

Route::resource('jenis_ternaks', 'JenisTernakAPIController');