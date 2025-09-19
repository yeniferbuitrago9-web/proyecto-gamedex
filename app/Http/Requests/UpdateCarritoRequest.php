<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarritoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite que cualquier usuario autenticado lo use
    }

    public function rules(): array
    {
        return [
            'cantidades' => 'required|array',
            'cantidades.*' => 'required|integer|min:1', // cada cantidad debe ser >= 1
        ];
    }

    public function messages(): array
    {
        return [
            'cantidades.required' => 'Debe enviar las cantidades de los productos.',
            'cantidades.*.integer' => 'Cada cantidad debe ser un número entero.',
            'cantidades.*.min' => 'La cantidad mínima es 1.',
        ];
    }
}
