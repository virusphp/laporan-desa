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

Route::get('portal/rkp', 'RenjaController@index')->name('renja.index');
Route::get('/rkp', 'PdfController@reportRKP')->name('rkp');
Route::get('/rpj', 'PdfController@reportRPJ')->name('rpj');
Route::get('/rpbd', 'PdfController@reportAPBD')->name('rpbd');
Auth::routes();

