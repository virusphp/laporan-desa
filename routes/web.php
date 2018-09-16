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

// RPJ M
Route::get('/portal/rpj', 'RpjController@index')->name('rpj.index');
Route::post('/rpj/kecamatan', 'RpjController@getKecamatan')->name('rpj.kecamatan');
Route::post('/rpj/kecamatan/desa', 'RpjController@getDesa')->name('rpj.desa');

// APBDES
Route::get('/portal/apbd', 'ApbdController@index')->name('apbd.index');
Route::post('/apbd/kecamatan', 'ApbdController@getKecamatan')->name('apbd.kecamatan');
Route::post('/apbd/kecamatan/desa', 'ApbdController@getDesa')->name('apbd.desa');

Route::post('/rkp', 'PdfController@reportRKP')->name('rkp.search');
Route::post('/rkpp', 'PdfController@reportRKPP')->name('rkpp.search');
Route::post('/rpj', 'PdfController@reportRPJ')->name('rpj.search');
Route::post('/apbd', 'PdfController@reportAPBD')->name('apbd.search');
Auth::routes();

Route::get('/api/v1/rkp', 'RkpController@apiRKP')->name('api.rkp')->middleware('cors');
Route::get('/api/v1/rpj', 'RpjController@apiRPJ')->name('api.rpj')->middleware('cors');
Route::get('/api/v1/apbd', 'ApbdController@apiAPBD')->name('api.apbd')->middleware('cors');

//Rkpdes
Route::post('/rkpdes/desa', 'RkpController@getDesa')->name('rkpdes.desa');
Route::get('/portal/rkpdes', 'RkpdesController@index')->name('rkpdes.index');
Route::post('/rkpdes', 'RkpdesController@reportRkpDes')->name('rkpdes.pdf');
