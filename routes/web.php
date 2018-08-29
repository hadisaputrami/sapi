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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('asuransis', 'AsuransiController');

Route::resource('biodatas', 'BiodataController');

Route::resource('ternaks', 'TernakController');

Route::resource('agamas', 'AgamaController');

Route::resource('articles', 'ArticleController');

Route::resource('dataUsahas', 'DataUsahaController');

Route::resource('investors', 'InvestorController');

Route::resource('investorHasTransaksiInvestasis', 'InvestorHasTransaksiInvestasiController');

Route::resource('jenisPembayarans', 'JenisPembayaranController');

Route::resource('jenisTernaks', 'JenisTernakController');

Route::resource('konfirmasiInvestors', 'KonfirmasiInvestorController');

Route::resource('permissions', 'PermissionController');

Route::resource('paketInvestasis', 'PaketInvestasiController');

Route::resource('peternaks', 'PeternakController');

Route::resource('progres', 'ProgresController');

//Route::resource('roles', 'RoleController');

Route::resource('statusPenjualans', 'StatusPenjualanController');

Route::resource('statusTransaksiInvestasis', 'StatusTransaksiInvestasiController');

Route::resource('transaksiInvestasis', 'TransaksiInvestasiController');

Route::resource('transInvesHasStatusInves', 'TransInvesHasStatusInvesController');

Route::resource('transaksiPenjualans', 'TransaksiPenjualanController');

Route::resource('transPenjHasStatusPenj', 'TransaksiPenjualanHasStatusPenjualanController');

Route::resource('users', 'UserController');

Route::resource('ternakInvestasis', 'TernakInvestasiController');

Route::resource('ternakNonInvestasis', 'TernakNonInvestasiController');

Route::resource('ternaks', 'TernakController');

Route::resource('ternakNonInvestasis', 'TernakNonInvestasiController');

Route::resource('jenisTernaks', 'JenisTernakController');

Route::resource('roles', 'RoleController');

Route::resource('user_role', 'UserRoleController', ['except' => [
    'create', 'store', 'show', 'destroy',
]]);

//Route::get('tombolkonfirmasi/{id}', 'KonfirmasiInvestorController@konfirmasi');

Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
Route::resource('permissions', 'PermissionController');


Route::resource('statusKonfirmasis', 'StatusKonfirmasiController');


Route::resource('ternakInvestasis', 'TernakInvestasiController');

Route::resource('ternakNonInvestasis', 'TernakNonInvestasiController');

Route::resource('progres', 'ProgresController');

Route::resource('transInvesHasStatusInves', 'TransInvesHasStatusInvesController');

