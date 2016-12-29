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

//custome route for auth
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*Auth::routes();
if (env('DENY_REGISTRATION_AND_RESET', true)) {
    Route::any('/register', function() {
        abort(403);
    });

    Route::any('/password/email', function() {
        abort(403);
    });

    Route::any('/password/reset', function() {
        abort(403);
    });

    Route::any('/password/reset/{token}', function() {
        abort(403);
    });
}*/

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index');
    Route::get('/profile', 'HomeController@showProfile')->name('profile.show');
    Route::get('/profile/edit', 'HomeController@editProfile')->name('profile.edit');
    Route::post('/profile/edit', 'HomeController@updateProfile')->name('profile.update');

    //master
    Route::group(['middleware' => 'role:admin'], function() {
        Route::resource('/user', 'UserController', ['except' => ['show']]);
        Route::resource('/matakuliah', 'MatakuliahController', ['except' => ['show']]);
        Route::resource('/kompetensi', 'KompetensiController', ['except' => ['show']]);
        Route::resource('/aspek', 'AspekController', ['except' => ['show']]);
        Route::put('/periode/{semester}/aktifkan', 'PeriodeController@aktifkan')->name('periode.aktifkan');
        Route::resource('/periode', 'PeriodeController', ['except' => ['show']]);
    });

    //registrasi matakuliah
    Route::get('/registrasi_matakuliah', 'RegistrasiMatakuliahController@index')
        ->middleware('role:admin|prodi')
        ->name('registrasi_matakuliah.index');
    Route::post('/registrasi_matakuliah/{periode}', 'RegistrasiMatakuliahController@store')
        ->middleware('role:admin')
        ->name('registrasi_matakuliah.store');
    Route::get('/registrasi_matakuliah/{periode}/create', 'RegistrasiMatakuliahController@create')
        ->middleware('role:admin')
        ->name('registrasi_matakuliah.create');    
    Route::delete('/registrasi_matakuliah/{periode}/{reg_mk}', 'RegistrasiMatakuliahController@destroy')
        ->middleware('role:admin')
        ->name('registrasi_matakuliah.destroy');
    Route::put('/registrasi_matakuliah/{periode}/{reg_mk}', 'RegistrasiMatakuliahController@update')
        ->middleware('role:admin')
        ->name('registrasi_matakuliah.update');
    Route::get('/registrasi_matakuliah/{periode}', 'RegistrasiMatakuliahController@show')
        ->middleware('role:admin|prodi')
        ->name('registrasi_matakuliah.show');
    Route::get('/registrasi_matakuliah/{periode}/topdf/{time}', 'RegistrasiMatakuliahController@toPDF')
        ->middleware('role:admin|prodi')
        ->name('registrasi_matakuliah.topdf');
    Route::get('/registrasi_matakuliah/{periode}/{reg_mk}/edit', 'RegistrasiMatakuliahController@edit')
        ->middleware('role:admin')
        ->name('registrasi_matakuliah.edit');

    // registrasi mahasiswa
    Route::get('/registrasi_matakuliah/{periode}/{reg_mk}/mahasiswa', 'RegistrasiMahasiswaController@index')
        ->middleware('role:admin|prodi')
        ->name('registrasi_mahasiswa.index');
    Route::get('/registrasi_matakuliah/{periode}/{reg_mk}/mahasiswa/topdf/{time}', 'RegistrasiMahasiswaController@toPDF')
        ->middleware('role:admin|prodi')
        ->name('registrasi_mahasiswa.topdf');
    Route::get('/registrasi_matakuliah/{periode}/{reg_mk}/mahasiswa/create', 'RegistrasiMahasiswaController@create')
        ->middleware('role:admin')
        ->name('registrasi_mahasiswa.create');
    Route::post('/registrasi_matakuliah/{periode}/{reg_mk}/mahasiswa', 'RegistrasiMahasiswaController@store')
        ->middleware('role:admin')
        ->name('registrasi_mahasiswa.store');
    Route::delete('/registrasi_matakuliah/{periode}/{reg_mk}/mahasiswa/{reg_mhs}', 'RegistrasiMahasiswaController@destroy')
        ->middleware('role:admin')
        ->name('registrasi_mahasiswa.destroy'); 

    //kuisioner mahasiswa
    Route::group(['middleware' => 'role:mahasiswa'], function() {
        Route::get('/katalog', 'KuisionerMahasiswaController@index')
            ->name('katalog.index');
        Route::get('/katalog/{id}', 'KuisionerMahasiswaController@show')
            ->name('katalog.show');
        Route::post('/katalog/{id}', 'KuisionerMahasiswaController@store')
            ->name('katalog.store');
    });        
});
