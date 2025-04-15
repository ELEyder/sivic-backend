<?php

namespace App\Http\Controllers;

use App\Models\InformationPage;
use Illuminate\Http\Request;

class InformationPageController extends Controller
{
    /**
     * Mostrar la información.
     */
    public function index()
    {
        $info = InformationPage::first();
        return response()->json($info);
    }

    /**
     * Actualizar la información.
     */
    public function update(Request $request)
    {
        $info = InformationPage::first();

        if (!$info) {
            $info = new InformationPage();
        }

        $info->fill($request->except(['image_1', 'image_2', 'image_3']));

        // Manejo de imágenes si se suben
        foreach (['image_1', 'image_2', 'image_3'] as $index => $imageField) {
            if ($request->hasFile($imageField)) {
                $filename = 'image' . ($index + 1) . '.' . $request->file($imageField)->getClientOriginalExtension();

                $request->file($imageField)->storeAs('information', $filename, 'public');

                $info->$imageField = "/storage/information/" . $filename;
            }
        }

        $info->save();

        return response()->json([
            'message' => 'Información actualizada correctamente.',
            'data' => $info
        ]);
    }
}
