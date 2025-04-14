<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCasoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dni' => 'nullable|numeric',
            'nombre_completo' => 'nullable|string',
            'genero' => 'nullable|string',
            'telefono' => 'nullable|numeric',
            'nacionalidad' => 'nullable|string',
            'direccion' => 'nullable|string',
            'departamento' => 'nullable|string',
            'provincia' => 'nullable|string',
            'distrito' => 'nullable|string',
            'lugar_caso' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'autorizacion_comunicacion' => 'nullable|boolean',
            'autorizacion_copia_reporte' => 'nullable|boolean',
            'fecha_resolucion' => 'nullable|date',
            'asignado' => 'nullable|string',
            'resolucion' => 'nullable|string',
            'resolucion_archivo' => 'nullable|file|mimes:jpg,jpeg,png,pdf,xlsx,xls',
            'tipo_caso_id' => 'nullable|exists:tipos_caso,id',
            'estado_id' => 'exists:estados,id',
        ];
    }
}
