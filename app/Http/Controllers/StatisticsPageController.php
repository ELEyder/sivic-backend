<?php

namespace App\Http\Controllers;

use App\Models\StatisticsPage;
use Illuminate\Http\Request;

class StatisticsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stats = StatisticsPage::first();
        return response()->json($stats);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $home = StatisticsPage::first();

        if (!$home) {
            $home = new StatisticsPage();
        }

        $home->fill($request->all());

        $home->save();

        return response()->json([
            'message' => 'Página de estadísticas actualizada correctamente.',
            'data' => $home
        ], 201);
    }

}
