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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profil_saya/{id}', 'HomeController@profil_saya')->name('home.profil_saya');
Route::get('/home/edit/{id}', 'HomeController@edit')->name('home.edit');
Route::post('/home/update/{id}', 'HomeController@update')->name('home.update');

Route::get('/', 'EVoteController@landing');
Route::get('/signIn', 'EVoteController@signIn');
Route::post('/postSignIn', 'LoginController@postSignIn')->name('postSignIn');
Route::get('/logout', 'LoginController@logout');

Auth::routes();

Route::group(['middleware' => ['auth'=>'Masyarakat']],function(){
    Route::get('/Masyarakat/home', 'MasyarakatController@home');
    Route::get('/masyarakat', 'MasyarakatController@index');
    Route::get('/masyarakat/tambah', 'MasyarakatController@tambah');
    Route::post('/masyarakat/tambah', 'MasyarakatController@tambah_data');
    Route::get('/masyarakat/update/{id}', 'MasyarakatController@edit_data');
    Route::post('/masyarakat/update/{id}', 'MasyarakatController@edit');
    Route::get('/masyarakat/delete/{id}', 'MasyarakatController@delete');
});

Route::group(['middleware' => ['auth'=>'Kandidat']],function(){
    Route::get('/kandidat', 'KandidatController@tambah');
    Route::get('/kandidat/home', 'KandidatController@home');
    Route::get('/kandidat/cari', 'KandidatController@cari');
    // Route::post('/kandidat/level_kandidat/{id}', 'KandidatController@jadikan_kandidat');
    Route::get('/kandidat/detail', 'KandidatController@detail_kandidat');
    Route::get('/kandidat/lengkapi/{id}', 'KandidatController@lengkapi_data');
    Route::post('/kandidat/lengkapi/{id}', 'KandidatController@create_data');
    Route::get('/kandidat/edit/{id}', 'KandidatController@edit_kandidat');
    Route::post('/kandidat/update/{id}', 'KandidatController@update_kandidat');
    Route::get('/kandidat/dataKampanye', 'kampanyeController@data');
    Route::get('/kandidat/tambahKampanye', 'kampanyeController@form');
    Route::post('/kandidat/postFormKampanye', 'kampanyeController@create');
});

Route::group(['middleware' => ['auth'=>'Petugas']],function(){
    Route::get('/Petugas/home', 'petugasController@home');
    Route::get('/dataPetugas', 'petugasController@data');
    Route::get('/tambahPetugas', 'petugasController@form');
    Route::post('/postFormPetugas', 'petugasController@create');
    Route::get('/editPetugas/{id}', 'petugasController@edit');
    Route::post('/dataPetugas/{id}/update', 'petugasController@update');
    Route::get('/hapusPetugas/{id}', 'petugasController@hapus');
});

Route::group(['middleware' => ['auth'=>'Admin']],function(){
    Route::get('/Admin/home', 'AdminController@home');
});
