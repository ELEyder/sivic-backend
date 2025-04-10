<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

  Route::resource('casos', 'CasoController');
  Route::put('casos/{id}', 'CasoController@update');
  Route::delete('casos/{id}', 'CasoController@destroy');

  Route::resource('contactos', 'ContactoController');
  Route::put('contactos/{id}', 'ContactoController@update');
  Route::delete('contactos/{id}', 'ContactoController@destroy');

  Route::put('test-upload', function(Request $request) {
    return response()->json([
        'method' => $request->method(),
        'received_data' => $request->all(),
        'files' => array_map(function($file) {
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
