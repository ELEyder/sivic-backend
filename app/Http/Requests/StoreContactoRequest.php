<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactoRequest extends FormRequest
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
            'nombre_completo' => 'required|string',
            'dni' => 'required|numeric',
            'telefono' => 'required|numeric',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string',
            'mensaje' => 'required|string',
            'estado_id' => 'exists:estados,id',
        ];
    }
}
