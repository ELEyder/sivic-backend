<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
        
        $result = $response->json();

        if (!($result['success'] ?? false)) {
            return response()->json([
                'message' => 'Captcha inválido. Por favor, inténtalo de nuevo.'
            ], 422);
        }

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
        $caso = Caso::with('estado','tipo_caso')->find($id);
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


        $caso = Caso::find($id);

        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }

        $validacion = [
            'dni' => 'nullable|numeric',
            'nombre_completo' => 'nullable|string',
            'genero' => 'nullable|string',
            'telefono' => 'nullable|numeric',
            'nacionalidad' => 'nullable|string',
            'direccion' => 'nullable|string',
            'departamento' => 'nullable|string',
            'provincia' => 'nullable|string',
            'distrito' => 'nullable|string',
            'tipo_caso_id' => 'nullable|exists:tipos_caso,id',
            'lugar_caso' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'autorizacion_comunicacion' => 'nullable|boolean',
            'autorizacion_copia_reporte' => 'nullable|boolean',
            'fecha_resolucion' => 'nullable|date',
            'estado_id' => 'nullable|exists:estados,id',
            'asignado' => 'nullable|string',
            'resolucion' => 'nullable|string',
        ];

        $requestFields = $request->only(array_keys($validacion));
        
        $request->validate(array_filter($validacion, function ($field) use ($requestFields) {
            return array_key_exists($field, $requestFields);
        }));

        $data = $request->only(array_keys($validacion));

        if ($request->has('fecha_resolucion') && $request->fecha_resolucion) {
            $data['fecha_resolucion'] = Carbon::parse($request->fecha_resolucion);
        }

        $caso->update($data);

        $caso->refresh();
        
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
