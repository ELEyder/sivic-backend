<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCasoRequest;
use App\Http\Requests\UpdateCasoRequest;
use App\Models\Caso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Caso::with('estado', 'tipo_caso');

        if ($request->has('dni')) {
            $query->where('dni', $request->input('dni'));
        }

        $casos = $query->get();
        return response()->json($casos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCasoRequest $request)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (!($result['success'] ?? false)) {
            return response()->json([
                'message' => 'Captcha inválido. Por favor, inténtalo de nuevo.',
                'result' => $result
            ], 422);
        }

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
            'asignado' => $request->asignado,
            'resolucion' => $request->resolucion,
            'fecha_resolucion' => $request->fecha_resolucion ? Carbon::parse($request->fecha_resolucion) : null,
            'estado_id' => $request->estado_id ?? 1,
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
        $caso = Caso::with('estado', 'tipo_caso')->find($id);
        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }
        return response()->json($caso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCasoRequest $request, $id)
    {
        $caso = Caso::find($id);

        if (!$caso) {
            return response()->json(['message' => 'Caso no encontrado'], 404);
        }

        $data = $request->only(array_keys($request->rules()));

        if ($request->hasFile('resolucion_archivo')) {
            $archivo = $request->file('resolucion_archivo');
            if ($archivo->isValid()) {
                $ruta = $archivo->store('resoluciones', 'public');
                $url = Storage::url($ruta);

                $data['resolucion_url'] = $url;
            } else {
                return response()->json(['message' => 'El archivo no es válido.'], 422);
            }
        }

        // Fecha asignada
        if ($request->estado_id == 4) {
            $data['fecha_resolucion'] = Carbon::now();
            $data['fecha_atencion'] = $caso->fecha_atencion ?? Carbon::now();
        } else if ($request->estado_id == 3) {
            $data['fecha_atencion'] = Carbon::now();
        } else {
            $data['fecha_resolucion'] = null;
            $data['fecha_atencion'] = null;
        }

        // Fecha parseada
        if ($request->has('fecha_resolucion') && $request->fecha_resolucion) {
            $data['fecha_resolucion'] = Carbon::parse($request->fecha_resolucion);
        }

        // Caso actualizado
        $caso->update($data);
        $caso->refresh();

        return response()->json([
            'message' => 'Caso actualizado exitosamente',
            'caso' => $caso,
            'datos_eviados' => $request
        ]);
    }

    // CasoController.php
    public function dashboardData()
    {
        return response()->json([
            'grafico_mensual' => Caso::getCasosPorMes(),
            'estados' => Caso::getEstadisticasEstados(),
            'total' => Caso::count(),
            'ultima_actualizacion' => Caso::getUltimaActualizacion()
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
