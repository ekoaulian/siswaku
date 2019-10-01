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
//siswaku 
// Route::get('/', function () {
//     return 'Halaman Homepage.<br>
//     		Selamat Belajar laravel';
// });

// Route::get('/', function () {
//     return view ('homepage');
// });
// Route::get('about', function () {
//     return view ('about');
// });

// Route::get('daftar_siswa', function () {
// 	$siswa = ['Eko ',
// 				'Agus',
// 				'Rohman',
// 				'Ian'];
//     return view ('siswa.daftar_siswa', compact('siswa'));
// });

//siswaku/about
// Route::get('about', function () {
//     return 'Aplikasi <strong> Siswaku</strong> dibuat sebagai latihan untuk 	mempelajari laravel';
// });

// siswaku/halaman-rahasia
// Route::get('halaman-rahasia', ['as' => 'secret', function() {
// 	return 'anda sedang melihat
// 			<b>Halaman rahasia.</b>';
// }]);

Route::get('halaman-rahasia', 'RahasiaController@halamanrahasia')->name('secret');

//otomatis ke url siswaku/halaman-rahasia
Route::get('showmesecret', 'RahasiaController@showMeSecret' );

Route::get('/', 'PagesController@homepage');

Route::get('about', 'PagesController@about');

//siswa
// Route::get('siswa', 'SiswaController@index');
// Route::get('siswa/create', 'SiswaController@create');
// Route::get('siswa/{siswa}', 'SiswaController@show');
// Route::post('siswa', 'SiswaController@store');
// Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
// Route::patch('siswa/{siswa}', 'SiswaController@update');
// Route::delete('siswa/{siswa}', 'SiswaController@destroy');
route::resource('siswa', 'SiswaController');
route::resource('kelas', 'SiswaController')->parameters(['kelas'=>'kelas']);

Route::get('date-mutator', 'SiswaController@dateMutator');

//sample data siswa insert ke database(rest)
// Route::get('sampledata', function() {
//     DB::table('siswa')->insert([
//         [
//             'nisn'          => '1001',
//             'nama_siswa'    => 'Eko',
//             'tanggal_lahir' => '1997-02-23',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1002',
//             'nama_siswa'    => 'agus',
//             'tanggal_lahir' => '1987-02-01',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1003',
//             'nama_siswa'    => 'serlina',
//             'tanggal_lahir' => '1993-06-07',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1004',
//             'nama_siswa'    => 'atoh',
//             'tanggal_lahir' => '1996-08-17',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1005',
//             'nama_siswa'    => 'nuy',
//             'tanggal_lahir' => '1993-12-13',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1006',
//             'nama_siswa'    => 'ian',
//             'tanggal_lahir' => '1998-04-12',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1007',
//             'nama_siswa'    => 'diaz',
//             'tanggal_lahir' => '1997-03-21',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1008',
//             'nama_siswa'    => 'budi',
//             'tanggal_lahir' => '1996-06-22',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1009',
//             'nama_siswa'    => 'putra',
//             'tanggal_lahir' => '1995-02-23',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//         [
//             'nisn'          => '1010',
//             'nama_siswa'    => 'asifa',
//             'tanggal_lahir' => '1997-07-19',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2019-08-14 11:53:10',
//             'updated_at'    => '2019-08-14 11:53:10'
//         ],
//     ]);
// });


