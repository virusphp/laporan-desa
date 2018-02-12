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

Route::get('/portal/rkp', 'RenjaController@index')->name('renja.index');
Route::post('/rkp/desa', 'RenjaController@getDesa')->name('renja.desa');

Route::get('/portal/rpj', 'RpjController@index')->name('rpj.index');
Route::post('/rpj/kecamatan', 'RpjController@getKecamatan')->name('rpj.kecamatan');
Route::post('/rpj/kecamatan/desa', 'RpjController@getDesa')->name('rpj.desa');

Route::post('/rkp', 'PdfController@reportRKP')->name('renja.search');
Route::post('/rpj', 'PdfController@reportRPJ')->name('rpj.search');
Route::get('/rpbd', 'PdfController@reportAPBD')->name('rpbd');
Auth::routes();

Route::get('/api/v1/renja', 'RenjaController@apiRenja')->name('api.renja');
Route::get('/api/v1/rpj', 'RpjController@apiRPJ')->name('api.rpj');
