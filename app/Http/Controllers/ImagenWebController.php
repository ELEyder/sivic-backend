<?php

namespace App\Http\Controllers;

use App\Models\ImagenWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenWebController extends Controller
{
    public function index()
    {
        $imagenes = ImagenWeb::all(['key', 'path']);

        $result = $imagenes->mapWithKeys(function ($item) {
            return [$item->key => $item->path];
        });
        
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $contacto = ImagenWeb::create([
            'key' => $request->key,
            'path' => $request->path,
        ]);

        return response()->json([
            'message' => 'Imagen registrada exitosamente',
            'data' => $contacto
        ], 201);
    }

    public function show($key)
    {
        $imagen = ImagenWeb::where('key', $key);
        if (!$imagen) {
            return response()->json(['message' => 'Imagen no encontrada'], 404);
        }
        return response()->json($imagen);
    }

    public function update(Request $request)
    {
        $tipos = ['logo', 'carrusel1', 'carrusel2', 'carrusel3'];

        foreach ($tipos as $tipo) {
            if ($request->hasFile($tipo)) {
                $file = $request->file($tipo);
                $imagenExistente = ImagenWeb::where('key', $tipo)->first();
                if ($imagenExistente && Storage::disk('public')->exists(str_replace('/storage/', '', $imagenExistente->path))) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $imagenExistente->path));
                }

                $nombreArchivo = $tipo . '.' . $file->getClientOriginalExtension();

                $ruta = $file->storeAs('web_images', $nombreArchivo, 'public');

                ImagenWeb::updateOrCreate(
                    ['key' => $tipo],
                    ['path' => '/storage/' . $ruta]
                );
            }
        }

        return response()->json(['message' => 'Imágenes actualizadas correctamente.']);
    }

    public function destroy($id)
    {
        $contacto = ImagenWeb::find($id);
        if (!$contacto) {
            return response()->json(['message' => 'Consulta no encontrada'], 404);
        }

        $contacto->delete();

        return response()->json(['message' => 'Consulta eliminada exitosamente']);
    }
}
