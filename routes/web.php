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
    return redirect('/login');
});

Auth::routes();

//  Route::get('/register', function () {
//    //  return redirect('/login');
//  })->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('inscripciones', 'InscriptionController');

    Route::get('download/alumno', 'InscriptionController@getDownloadStudentCertificate')->name(
        'download.student.certificate'
    );

    Route::get(
        'download/negativa',
        'InscriptionController@getDownloadAnsesNegative'
    )->name('download.anses.negative');

    Route::get('/descargar-listado', function () {
        return response()->download(
            public_path('archivos/listado_guardavidas.pdf')
        );
    })->name('download.lifeguard.list');

    Route::get('/descargar-listado19-12', function () {
        return response()->download(
            public_path('archivos/listado_guardavidas19-12.pdf')
        );
    })->name('download.lifeguard.list19-12');

    Route::get('/descargar-listado01-21', function () {
        return response()->download(
            public_path('archivos/listado_guardavidas01-21.pdf')
        );
    })->name('download.lifeguard.list01-21');

    Route::get('/descargar-listado-ext-2021', function () {
        return response()->download(
            public_path('archivos/listado_guardavidas_ext_2021.pdf')
        );
    })->name('download.lifeguard.list.ext');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('listado-inscripciones', 'AdminController@index')->name(
            'inscriptions.list'
        );

        Route::get(
            'listado-inscripciones-revision-pendientes',
            'AdminController@pendingList'
        )->name('pending.list');

        Route::patch(
            'observaciones/actualizar/{id}',
            'AdminController@update'
        )->name('observations.update');

        Route::get(
            'certificate/download/{id}',
            'InscriptionController@getDownloadStudentCertificateAdmin'
        )->name('student.certificate.download.admin');

        Route::get(
            'negativa/download/{id}',
            'InscriptionController@getDownloadAnsesNegativeAdmin'
        )->name('anses.negative.download.admin');
    });

});
