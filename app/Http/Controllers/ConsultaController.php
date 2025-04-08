<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $casos = Consulta::with('estado')->get();
        return response()->json($casos);
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre_completo' => 'required|string',
            'dni' => 'required|numeric',
            'telefono' => 'required|numeric',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string',
            'mensaje' => 'required|string',
            'estado_id' => 'required|exists:estados,id',
        ]);

        // Crear la consulta utilizando el estado_id
        $consulta = Consulta::create([
            'nombre_completo' => $request->nombre_completo,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'mensaje' => $request->mensaje,
            'estado_id' => $request->estado_id,
        ]);

        return response()->json([
            'message' => 'Consulta registrada exitosamente',
            'data' => $consulta
        ], 201);
    }

    public function show($id)
    {
        $consulta = Consulta::find($id);
        if (!$consulta) {
            return response()->json(['message' => 'Consulta no encontrada'], 404);
        }
        return response()->json($consulta);
    }

    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);
        if (!$consulta) {
            return response()->json(['message' => 'Consulta no encontrada'], 404);
        }

        $request->validate([
            'nombre_completo' => 'sometimes|string',
            'dni' => 'sometimes|numeric',
            'telefono' => 'sometimes|numeric',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string',
            'mensaje' => 'sometimes|string',
            'estado_id' => 'nullable|exists:estados,id',
        ]);

        $consulta->update($request->only([
            'nombre_completo', 'dni', 'telefono', 'correo', 'direccion', 'mensaje', 'estado_id'
        ]));

        return response()->json([
            'message' => 'Consulta actualizada correctamente',
            'data' => $consulta
        ]);
    }

    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        if (!$consulta) {
            return response()->json(['message' => 'Consulta no encontrada'], 404);
        }

        $consulta->delete();

        return response()->json(['message' => 'Consulta eliminada exitosamente']);
    }
}
