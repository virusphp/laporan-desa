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

Route::get('/', function() {
	return view('home');
});
// Rencana Kegiatan
Route::get('/portal/rkp', 'RkpController@index')->name('rkp.index');
Route::post('/rkp/desa', 'RkpController@getDesa')->name('rkp.desa');

// Rencana Kerja
Route::get('/portal/rkpp', 'RkppController@index')->name('rkpp.index');

Route::get('/portal/rpj', 'RpjController@index')->name('rpj.index');
Route::post('/rpj/kecamatan', 'RpjController@getKecamatan')->name('rpj.kecamatan');
Route::post('/rpj/kecamatan/desa', 'RpjController@getDesa')->name('rpj.desa');

Route::post('/rkp', 'PdfController@reportRKP')->name('rkp.search');
Route::post('/rkpp', 'PdfController@reportRKPP')->name('rkpp.search');
Route::post('/rpj', 'PdfController@reportRPJ')->name('rpj.search');
Route::get('/rpbd', 'PdfController@reportAPBD')->name('rpbd');
Auth::routes();

Route::get('/api/v1/rkp', 'RkpController@apiRKP')->name('api.rkp');
Route::get('/api/v1/rpj', 'RpjController@apiRPJ')->name('api.rpj');
Route::get('/api/v1/apbd', 'ApbdController@apiAPBD')->name('api.apbd');
