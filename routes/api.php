<?php

use App\Http\Controllers\CasoController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\InformationPageController;
use App\Http\Controllers\StatisticsPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('casos/dashboard-data', [CasoController::class, 'dashboardData']);
    Route::resource('casos', 'CasoController');
    Route::put('casos/{id}', 'CasoController@update');
    Route::delete('casos/{id}', 'CasoController@destroy');
    
    Route::resource('contactos', 'ContactoController');
    Route::put('contactos/{id}', 'ContactoController@update');
    Route::delete('contactos/{id}', 'ContactoController@destroy');

    Route::resource('imagenes_web', 'ImagenWebController');
    Route::put('imagenes_web', 'ImagenWebController@update');
    Route::delete('imagenes_web/{id}', 'ImagenWebController@destroy');

    Route::get('home-page', [StatisticsPageController::class, 'index']);
    Route::post('home-page', [StatisticsPageController::class, 'update']);

    Route::get('statistics-page', [StatisticsPageController::class, 'index']);
    Route::post('statistics-page', [StatisticsPageController::class, 'update']);

    Route::get('information-page', [InformationPageController::class, 'index']);
    Route::post('information-page', [InformationPageController::class, 'update']);

    Route::put('test-upload', function (Request $request) {
        return response()->json([
            'method' => $request->method(),
            'received_data' => $request->all(),
            'files' => array_map(function ($file) {
                return [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType()
                ];
            }, $request->allFiles()),
            'php_input' => base64_encode(file_get_contents('php://input'))
        ]);
    });
});
