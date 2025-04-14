<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        $home = HomePage::first();
        return response()->json($home);
    }

    public function update(Request $request, string $id)
    {

        $home = HomePage::first();

        if (!$home) {
            $home = new HomePage();
        }

        $home->fill($request->all());

        $home->save();
        return response()->json([
            'message' => 'Página de inicio actualizada correctamente.',
            'data' => $home
        ], 201);
    }

}
