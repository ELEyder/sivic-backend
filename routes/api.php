<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ImagenWebController;
use App\Http\Controllers\InformationPageController;
use App\Http\Controllers\StatisticsPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::resource('imagenes_web', 'ImagenWebController');
    Route::get('home-page', [StatisticsPageController::class, 'index']);
    Route::get('statistics-page', [StatisticsPageController::class, 'index']);
    Route::get('information-page', [InformationPageController::class, 'index']);

    Route::get('casos/dashboard-data', [CasoController::class, 'dashboardData']);

    Route::post('casos', [CasoController::class, 'store']);
    Route::post('contactos', [ContactoController::class, 'store']);

    Route::middleware(['auth:sanctum', 'admin'])->group(function () {
        Route::get('casos', [CasoController::class, 'index']);
        Route::get('casos/{caso}', [CasoController::class, 'show']);
        Route::put('casos/{id}', [CasoController::class, 'update']);
        Route::delete('casos/{id}', [CasoController::class, 'destroy']);

        Route::get('contactos', [ContactoController::class, 'index']);
        Route::get('contactos/{contacto}', [ContactoController::class, 'show']);
        Route::put('contactos/{id}', [ContactoController::class, 'update']);
        Route::delete('contactos/{id}', [ContactoController::class, 'destroy']);

        Route::put('imagenes_web', [ImagenWebController::class, 'update']);
        Route::delete('imagenes_web/{id}', [ImagenWebController::class, 'destroy']);

        Route::post('home-page', [StatisticsPageController::class, 'update']);

        Route::post('statistics-page', [StatisticsPageController::class, 'update']);

        Route::post('information-page', [InformationPageController::class, 'update']);
    });

});
