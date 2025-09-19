<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarritoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producto_id' => 'required|exists:productos,id', // producto debe existir
            'cantidad' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'producto_id.required' => 'Debe seleccionar un producto.',
            'producto_id.exists' => 'El producto seleccionado no existe.',
            'cantidad.required' => 'Debe indicar una cantidad.',
            'cantidad.min' => 'La cantidad mínima es 1.',
        ];
    }
}
