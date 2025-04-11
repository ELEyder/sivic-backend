<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactoRequest;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $casos = Contacto::with('estado')->get();
        return response()->json($casos);
    }

    public function store(StoreContactoRequest $request)
    {
        $contacto = Contacto::create([
            'nombre_completo' => $request->nombre_completo,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'mensaje' => $request->mensaje,
            'estado_id' => $request->estado_id  ?? 1,
        ]);

        return response()->json([
            'message' => 'Consulta registrada exitosamente',
            'data' => $contacto
        ], 201);
    }

    public function show($id)
    {
        $contacto = Contacto::find($id);
        if (!$contacto) {
            return response()->json(['message' => 'Consulta no encontrada'], 404);
        }
        return response()->json($contacto);
    }

    public function update(Request $request, $id)
    {
        $contacto = Contacto::find($id);
        if (!$contacto) {
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

        $contacto->update($request->only([
            'nombre_completo', 'dni', 'telefono', 'correo', 'direccion', 'mensaje', 'estado_id'
        ]));

        return response()->json([
            'message' => 'Consulta actualizada correctamente',
            'data' => $contacto
        ]);
    }

    public function destroy($id)
    {
        $contacto = Contacto::find($id);
        if (!$contacto) {
            return response()->json(['message' => 'Consulta no encontrada'], 404);
        }

        $contacto->delete();

        return response()->json(['message' => 'Consulta eliminada exitosamente']);
    }
}
