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

Route::get('/', 'EVoteController@landing');
Route::get('/signIn', 'EVoteController@signIn')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::post('/adminLogin', 'LoginController@adminLogin')->name('adminLogin');
Route::get('/logout', 'LoginController@logout')->name('logout');


Route::get('/more', 'KampanyeController@selengkapnya');

Auth::routes();

Route::group(['middleware' => ['auth:user', 'ceklevel:admin']], function(){
    Route::get('/Admin/home', 'AdminController@home');
    //DATA PETUGAS
    Route::get('/Admin/dataPetugas', 'PetugasController@data');
    Route::get('/Admin/tambahPetugas', 'PetugasController@form');
    Route::post('/postFormPetugas', 'PetugasController@create');
    Route::get('/Admin/editPetugas/{id}', 'PetugasController@edit');
    Route::post('/dataPetugas/{id}/update', 'PetugasController@update');
    Route::get('/Admin/hapusPetugas/{id}', 'PetugasController@hapus');
    Route::get('/Admin/exportPetugas', 'PetugasController@export');
    Route::post('/Admin/importPetugas', 'PetugasController@import');
    Route::get('/Admin/cariPetugas', 'PetugasController@cari');
    Route::get('/petugas/cetak', 'petugasController@petugasPDF');
    //DATA MASYARAKAT
    Route::get('/Admin/dataMasyarakat', 'MasyarakatController@index');
    Route::get('/Admin/editMasyarakat/{id}', 'MasyarakatController@edit');
    Route::post('/updateMasyarakat/{id}', 'MasyarakatController@update');
    Route::get('/Admin/deleteMasyarakat/{id}', 'MasyarakatController@delete');
    Route::get('/exportMasyarakat', 'MasyarakatController@export');
    Route::get('/Admin/cariMasyarakat', 'MasyarakatController@cari');
    Route::get('/masyarakat/cetak', 'MasyarakatController@masyarakatPDF');
    //DATA KANDIDAT
    Route::get('/Admin/dataKandidat', 'KandidatController@tambah');
    Route::get('/Admin/detailKandidat', 'KandidatController@detail');
    Route::get('/Admin/cari', 'KandidatController@cari');
    Route::get('/Admin/lengkapi/{id}', 'KandidatController@lengkapi');
    Route::post('/Admin/lengkapiData/{id}', 'KandidatController@create');
    //DATA KAMPANYE
    Route::get('Admin/dataKampanye', 'KampanyeController@data');
    Route::get('/detail/{id}', 'KampanyeController@detail');
    Route::get('/cariKampanye', 'KampanyeController@cari');
    //JADWAL PEMILIHAN
    Route::get('/Admin/periode', 'PeriodeController@index');
    Route::post('/postPeriode', 'PeriodeController@atur_periode');
    Route::get('/Admin/exportHasil', 'PemilihanController@export');
    Route::get('/hasil/cetak', 'PemilihanController@hasilPDF');
    //VOTING
    Route::get('/Admin/pemilihan', 'PemilihanController@index');
    Route::get('/Admin/hasil_voting', 'PemilihanController@grafik');
    Route::post('/pilih/{id}', 'PemilihanController@pilih_kandidat');
    //PROFIL
    Route::get('/profil-admin', 'ProfilController@index_admin');
    Route::post('/profil-admin/{id}', 'ProfilController@update_admin');
    //RESET
    Route::post('/Admin/reset', 'PemilihanController@reset_data');
});

Route::group(['middleware' => ['auth:petugas', 'ceklevel:petugas']],function(){
    //DATA MASYARAKAT
    Route::get('/Petugas/home', 'petugasController@home');
    Route::get('/Petugas/dataMasyarakat', 'MasyarakatController@index');
    Route::get('/Petugas/tambah', 'MasyarakatController@tambah');
    Route::post('/Petugas/create', 'MasyarakatController@create');
    Route::get('/Petugas/edit/{id}', 'MasyarakatController@edit');
    Route::post('/Petugas/update/{id}', 'MasyarakatController@update');
    Route::get('/Petugas/delete/{id}', 'MasyarakatController@delete');
    Route::get('/exportMasyarakat', 'MasyarakatController@export');
    Route::post('/importMasyarakat', 'MasyarakatController@import');
    //DATA KAMPANYE
    Route::get('Petugas/dataKampanye', 'KampanyeController@data');
    Route::get('/selengkapnya/{id}', 'KampanyeController@detail');
    Route::get('/cariKampanye', 'KampanyeController@cari');
    //VOTING
    Route::get('/Petugas/pemilihan', 'PemilihanController@index');
    Route::post('/pilih/{id}', 'PemilihanController@pilih_kandidat');
    //PROFIL
    Route::get('/profil-petugas', 'ProfilController@index_petugas');
    Route::post('/profil-petugas/{id}', 'ProfilController@update_petugas');
});

Route::group(['middleware' => ['auth:masyarakat', 'ceklevel:pemilih,kandidat']],function(){
    Route::get('/Masyarakat/home', 'MasyarakatController@home');
    //DATA KAMPANYE
    Route::get('/baca_kampanye/{id}', 'KampanyeController@detail');
    Route::get('/cariKampanye', 'KampanyeController@cari');
    //KOMENTAR
    Route::post('/buatKomentar/{id}', 'KomentarController@create')->name('post_komen');
    //DATA KAMPANYE KANDIDAT
    Route::get('/Kandidat/dataKampanye', 'KampanyeController@dataku');
    Route::get('/Kandidat/tambahKampanye', 'KampanyeController@form');
    Route::post('/postFormKampanye', 'KampanyeController@create');
    Route::get('/Kandidat/editKampanye/{id}', 'KampanyeController@edit');
    Route::post('/updateKampanye/{id}', 'KampanyeController@update');
    Route::get('/Kandidat/hapusKampanye/{id}', 'KampanyeController@hapus');
    Route::get('/detailKampanye/{id}', 'KampanyeController@detail');
    //VOTING
    Route::get('/Masyarakat/pemilihan', 'PemilihanController@index');
    Route::post('/pilih/{id}', 'PemilihanController@pilih_kandidat');
    //PROFIL
    Route::get('/profil', 'ProfilController@index');
    Route::post('/profil/{id}', 'ProfilController@update');
});
