<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casos = Caso::with('estado', 'tipo_caso')->get();
        return response()->json($casos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|numeric',
            'nombre_completo' => 'required|string',
            'genero' => 'required|string',
            'telefono' => 'required|numeric',
            'nacionalidad' => 'required|string',
            'direccion' => 'required|string',
            'departamento' => 'required|string',
            'provincia' => 'required|string',
            'distrito' => 'required|string',
            'tipo_caso_id' => 'required|exists:tipos_caso,id',
            'lugar_caso' => 'required|string',
            'descripcion' => 'required|string',
            'autorizacion_comunicacion' => 'required|boolean',
            'autorizacion_copia_reporte' => 'required|boolean',
            'estado_id' => 'exists:estados,id',
            'asignado' => 'nullable|string',
            'resolucion' => 'nullable|string',
        ]);

        $caso = Caso::create([
            'dni' => $request->dni,
            'nombre_completo' => $request->nombre_completo,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
            'nacionalidad' => $request->nacionalidad,
            'direccion' => $request->direccion,
            'departamento' => $request->departamento,
            'provincia' => $request->provincia,
            'distrito' => $request->distrito,
            'tipo_caso_id' => $request->tipo_caso_id,
            'lugar_caso' => $request->lugar_caso,
            'descripcion' => $request->descripcion,
            'autorizacion_comunicacion' => $request->autorizacion_comunicacion,
            'autorizacion_copia_reporte' => $request->autorizacion_copia_reporte,
            'fecha_resolucion' => $request->fecha_resolucion ? Carbon::parse($request->fecha_resolucion) : null,
            'estado_id' => $request->estado_id ?? 1,
            'asignado' => $request->asignado,
            'resolucion' => $request->resolucion,
        ]);

        return response()->json([
            'message' => 'Caso creado exitosamente',
            'caso' => $caso
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $caso = Caso::with('estado')->find($id);
        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }
        return response()->json($caso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required|numeric',
            'nombre_completo' => 'required|string',
            'genero' => 'required|string',
            'telefono' => 'required|numeric',
            'nacionalidad' => 'required|string',
            'direccion' => 'required|string',
            'departamento' => 'required|string',
            'provincia' => 'required|string',
            'distrito' => 'required|string',
            'tipo_caso_id' => 'required|exists:tipos_caso,id',
            'lugar_caso' => 'required|string',
            'descripcion' => 'required|string',
            'autorizacion_comunicacion' => 'required|boolean',
            'autorizacion_copia_reporte' => 'required|boolean',
            'fecha_resolucion' => 'nullable|date',
            'estado_id' => 'required|exists:estados,id',
            'asignado' => 'nullable|string',
            'resolucion' => 'nullable|string',
        ]);

        $caso = Caso::find($id);
        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }

        $caso->update([
            'dni' => $request->dni,
            'nombre_completo' => $request->nombre_completo,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
            'nacionalidad' => $request->nacionalidad,
            'direccion' => $request->direccion,
            'departamento' => $request->departamento,
            'provincia' => $request->provincia,
            'distrito' => $request->distrito,
            'tipo_caso_id' => $request->tipo_caso_id,
            'lugar_caso' => $request->lugar_caso,
            'descripcion' => $request->descripcion,
            'autorizacion_comunicacion' => $request->autorizacion_comunicacion,
            'autorizacion_copia_reporte' => $request->autorizacion_copia_reporte,
            'fecha_resolucion' => $request->fecha_resolucion ? Carbon::parse($request->fecha_resolucion) : null,
            'estado_id' => $request->estado_id,
            'asignado' => $request->asignado,
            'resolucion' => $request->resolucion,
        ]);

        return response()->json([
            'message' => 'Caso actualizado exitosamente',
            'caso' => $caso
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $caso = Caso::find($id);
        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }

        $caso->delete();

        return response()->json(['message' => 'Caso eliminado exitosamente']);
    }
}
