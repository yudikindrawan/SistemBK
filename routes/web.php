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

// Route::get('/', function () {
//     return view('backend/dashboard');
// });
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'dashboardController@index')->name('dashboard');
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
// siswa route
Route::resource('siswa', 'siswacontroller');

// periode route
Route::resource('periode', 'periodecontroller');
Route::get('periode-ubah', 'periodecontroller@ubah')->name('editperiode');

// kelas route
Route::resource('kelas', 'kelascontroller');
Route::get('kelas-ubah', 'kelascontroller@ubah')->name('editkelas');
