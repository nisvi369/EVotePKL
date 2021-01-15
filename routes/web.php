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

Route::get('/', 'EVoteController@landing');
Route::get('/login', 'EVoteController@login');

Route::get('/masyarakat', 'MasyarakatController@index');
Route::get('/masyarakat/tambah', 'MasyarakatController@tambah');
Route::post('/masyarakat/tambah', 'MasyarakatController@tambah_data');
Route::get('/masyarakat/update/{id}', 'MasyarakatController@edit_data');
Route::post('/masyarakat/update/{id}', 'MasyarakatController@edit');
Route::get('/masyarakat/delete/{id}', 'MasyarakatController@delete');

Route::get('/dataPetugas', 'petugasController@data');
Route::get('/tambahPetugas', 'petugasController@form');
Route::post('/postFormPetugas', 'petugasController@create');
Route::get('/editPetugas/{id}', 'petugasController@edit');
Route::post('/dataPetugas/{id}/update', 'petugasController@update');
Route::get('/hapusPetugas/{id}', 'petugasController@hapus');

Route::get('/kandidat/dataKampanye', 'kampanyeController@data');
Route::get('/kandidat/tambahKampanye', 'kampanyeController@form');
Route::post('/kandidat/postFormKampanye', 'kampanyeController@create');
