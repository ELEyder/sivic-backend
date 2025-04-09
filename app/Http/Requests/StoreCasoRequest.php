<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCasoRequest extends FormRequest
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
            'dni' => 'required|numeric',
            'nombre_completo' => 'required|string',
            'genero' => 'required|string',
            'telefono' => 'required|numeric',
            'nacionalidad' => 'required|string',
            'direccion' => 'required|string',
            'departamento' => 'required|string',
            'provincia' => 'required|string',
            'distrito' => 'required|string',
            'lugar_caso' => 'required|string',
            'descripcion' => 'required|string',
            'autorizacion_comunicacion' => 'required|boolean',
            'autorizacion_copia_reporte' => 'required|boolean',
            'tipo_caso_id' => 'required|exists:tipos_caso,id',
            'estado_id' => 'exists:estados,id',
        ];
    }
}
