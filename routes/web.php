<?php

use App\konseling;
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

// Route::get('/', function () {
//     return view('backend/dashboard');
// });
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'dashboardController@index')->name('dashboard');
Route::get('chart', 'dashboardController@chart')->name('chart-bar');
Route::get('profile', 'dashboardController@profil')->name('profile');
Route::get('cari-siswa', 'dashboardController@cariSiswa')->name('cariSiswa');
Route::get('show-siswa', 'dashboardController@showData')->name('show-siswa');
Route::get('cetakSiswa_pdf/', 'dashboardController@cetak_pdf')->name('sp-cetak');
Route::get('show-pengembalian', 'dashboardController@pengembalianData')->name('pengembalian-siswa');
Route::get('cetakPengembalian_pdf/', 'dashboardController@cetak_pdf_pengembalian')->name('pengembalian-cetak');
Route::get('show_surat_peringtan', 'dashboardController@showPeringatanOrtu')->name('show_Peringatan');
Route::get('show_surat_pengembalian', 'dashboardController@showPengembalianOrtu')->name('show_Pengembalian');
Auth::routes();
// Login Route
Route::get('login', 'logincontroller@getlogin')->name('login');
Route::post('postlogin', 'logincontroller@postLogin')->name('postlogin');
// Logout Route
Route::get('/modal_logout', 'logoutcontroller@getlogout')->name('modal_logout');
Route::get('/logout', 'logoutcontroller@logout')->name('logout');
//  User Route
Route::resource('user', 'usercontroller');
Route::delete('user-delete', 'usercontroller@hapus')->name('user.hapus');
Route::get('user-ubah', 'usercontroller@ubah')->name('edituser');
Route::get('ubah', 'ubahpasswordcontroller@change')->name('changepass');
Route::post('passwordUbah', 'ubahpasswordcontroller@changePass')->name('changePassword');
// siswa route
Route::resource('siswa', 'siswacontroller');
Route::post('siswa/import_excel', 'siswacontroller@import_excel');
Route::get('siswa-ubah/', 'siswacontroller@ubah')->name('editsiswa');
// periode route
Route::resource('periode', 'periodecontroller');
Route::get('periode-ubah', 'periodecontroller@ubah')->name('editperiode');
// kelas route
Route::resource('kelas', 'kelascontroller');
Route::get('kelas-ubah', 'kelascontroller@ubah')->name('editkelas');
// pelanggaran routes
Route::resource('pelanggaran', 'pelanggarancontroller');
Route::get('pelanggaran-ubah', 'pelanggarancontroller@ubah')->name('editpelanggaran');
//konseling routes
Route::resource('konseling', 'konselingcontroller');
Route::get('konseling-cari', 'konselingcontroller@cari')->name('cari');
Route::get('pelanggaran-cari', 'konselingcontroller@cariPel')->name('cariPel');
Route::get('konseling-detail', 'konselingcontroller@show')->name('detailkonseling');
Route::put('konseling-valid/', 'konselingcontroller@valid')->name('konseling.valid');
Route::get('konseling-addreport', 'konselingcontroller@indexReport')->name('indexreport');
Route::get('cetak_pdf/{id}', 'konselingcontroller@cetak_pdf')->name('sp-cetak');
Route::get('index-SP', 'konselingcontroller@indexsurat')->name('index-SP');


//guru routes
Route::resource('guru', 'GuruController');
Route::get('siswa-view', 'GuruController@view')->name('siswaview');

Route::get('laporan', 'laporankonselingController@index')->name('laporan_konseling');
Route::post('cetak-view', 'laporankonselingController@tampil_data')->name('laporan_tampil');
Route::get('print/{awal}/{akhir}', 'laporankonselingController@cetak')->name('laporan_cetak');
