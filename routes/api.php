<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::resource('casos', 'CasoController');
    Route::post('casos/{id}', 'CasoController@update');
    Route::delete('casos/{id}', 'CasoController@destroy');

    Route::resource('consultas', 'ConsultaController');
    Route::post('consultas/{id}', 'ConsultaController@update');
    Route::delete('consultas/{id}', 'ConsultaController@destroy');
  });
