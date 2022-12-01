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

    Route::get('download/cv', 'InscriptionController@getDownloadCv')->name(
        'download.cv'
    );

    Route::get(
        'download/libreta',
        'InscriptionController@getDownloadLifeguardNotebook'
    )->name('download.lifeguardnotebook');

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
            'cv/download/{id}',
            'InscriptionController@getDownloadCvAdmin'
        )->name('cv.download.admin');

        Route::get(
            'libreta/download/{id}',
            'InscriptionController@getDownloadLifeguardNotebookAdmin'
        )->name('lifeguardnotebook.download.admin');
    });

});
