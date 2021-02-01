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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profil_saya/{id}', 'HomeController@profil_saya')->name('home.profil_saya');
Route::get('/home/edit/{id}', 'HomeController@edit')->name('home.edit');
Route::post('/home/update/{id}', 'HomeController@update')->name('home.update');

// Route::get('/', 'EVoteController@landing');
// Route::get('/signIn', 'EVoteController@signIn')->name('login');
Route::get('/loginPage', 'LoginController@login')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::post('/adminLogin', 'LoginController@adminLogin')->name('adminLogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Auth::routes();

Route::group(['middleware' => ['auth:user', 'ceklevel:admin']], function(){
    Route::get('/Admin/home', 'AdminController@home');
    //DATA PETUGAS
    Route::get('/Admin/dataPetugas', 'PetugasController@data');
    Route::get('/Admin/tambahPetugas', 'PetugasController@form');
    Route::post('/postFormPetugas', 'PetugasController@create');
    Route::get('/Admin/editPetugas/{id}', 'PetugasController@edit');
    Route::post('/dataPetugas/{id}/update', 'PetugasController@update');
    Route::get('/hapusPetugas/{id}', 'PetugasController@hapus');
    //DATA MASYARAKAT
    Route::get('/Admin/dataMasyarakat', 'MasyarakatController@data');
    //DATA KANDIDAT
    Route::get('/Admin/dataKandidat', 'KandidatController@data');
    Route::get('/Admin/detailKandidat', 'KandidatController@detail');
    Route::get('/Admin/cari', 'KandidatController@cari');
    Route::get('/Admin/lengkapi/{id}', 'KandidatController@lengkapi');
    Route::post('/Admin/lengkapiData/{id}', 'KandidatController@create');
    //DATA KAMPANYE
    Route::get('Admin/dataKampanye', 'KampanyeController@data');
    Route::get('/detailKampanye/{id}', 'KampanyeController@detail');
    //JADWAL PEMILIHAN
    Route::get('/Admin/jadwalPemilihan', 'PeriodeController@index');
    Route::post('/postPeriode', 'PeriodeController@atur_periode');
    //VOTING
    Route::get('/Admin/pemilihan', 'PemilihanController@index');
    //PROFIL
    Route::get('/profil-admin', 'ProfilController@index_admin');
    Route::post('/profil-admin/{id}', 'ProfilController@update_admin');
});

Route::group(['middleware' => ['auth:petugas', 'ceklevel:petugas']],function(){
    Route::get('/Petugas/home', 'PetugasController@home');
    //DATA MASYARAKAT
    Route::get('/Petugas/dataMasyarakat', 'MasyarakatController@data');
    Route::get('/Petugas/tambahDataMasyarakat', 'MasyarakatController@tambah');
    Route::post('/postDataMasyarakat', 'MasyarakatController@tambah_data');
    Route::get('/Petugas/edit/{id}', 'MasyarakatController@edit');
    Route::post('/Petugas/update/{id}', 'MasyarakatController@update');
    Route::get('/Petugas/hapus/{id}', 'MasyarakatController@hapus');
    //DATA KAMPANYE
    Route::get('/Petugas/dataKampanye', 'KampanyeController@data');
    Route::get('/detailKampanye/{id}', 'KampanyeController@detail');
    //PROFIL
    Route::get('/profil-petugas', 'ProfilController@index_petugas');
    Route::post('/profil-petugas/{id}', 'ProfilController@update_petugas');
});

Route::group(['middleware' => ['auth:masyarakat', 'ceklevel:pemilih,kandidat']],function(){
    Route::get('/Masyarakat/home', 'MasyarakatController@home');
    //DATA KAMPANYE
    Route::get('/Masyarakat/detail', 'KampanyeController@detail');
    //DATA KAMPANYE KANDIDAT
    Route::get('/Kandidat/dataKampanye', 'KampanyeController@data');
    Route::get('/Kandidat/tambahKampanye', 'KampanyeController@form');
    Route::post('/postFormKampanye', 'KampanyeController@create');
    Route::get('/Kandidat/editKampanye/{id}', 'KampanyeController@edit');
    Route::get('/updateKampanye/{id}', 'KampanyeController@update');
    Route::get('/Kandidat/hapusKampanye/{id}', 'KampanyeController@hapus');
    Route::get('/detailKampanye/{id}', 'KampanyeController@detail');
    //VOTING
    Route::get('/Masyarakat/pemilihan', 'PemilihanController@index');
    Route::post('/Masyarakat/pilih/{id}', 'PemilihanController@pilih_kandidat');
    Route::get('/Masyarakat/hasil_voting', 'PemilihanController@grafik');
    //PROFIL
    Route::get('/profil', 'ProfilController@index');
    Route::post('/profil/{id}', 'ProfilController@update');
});

// Route::group(['middleware' => ['auth'=>'masyarakat', 'ceklevel:kandidat']],function(){
//     Route::get('/Masyarakat/home', 'MasyarakatController@home');
//     //DATA KAMPANYE
//     Route::get('/Kandidat/dataKampanye', 'KampanyeController@data');
//     Route::get('/Kandidat/detail', 'KampanyeController@detail');
//     Route::get('/Kandidat/tambahKampanye', 'KampanyeController@form');
//     Route::post('/postKampanye', 'KampanyeController@create');
//     //VOTING
//     Route::get('/Kandidat/pemilihan', 'PemilihanController@index');
//     Route::post('/Kandidat/pilih/{id}', 'PemilihanController@pilih_kandidat');
//     Route::get('/Kandidat/hasil_voting', 'PemilihanController@grafik');
// });
