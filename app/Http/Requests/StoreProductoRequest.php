<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
               'nom_producto'   => 'required|string|max:20',
        'des_producto'   => 'required|string|max:250',
        'cant_producto'  => 'required|integer|min:1',
        'pre_producto'   => 'required|numeric|min:0',
            
        ];
    }
    
    public function messages()
    {
        return[
            'nom_producto.required'  => 'El nombre del producto es obligatorio',
        'nom_producto.max'       => 'El nombre no puede superar los 20 caracteres',

        // Descripción
        'des_producto.required'  => 'La descripción es obligatoria',
        'des_producto.max'       => 'La descripción no puede superar los 250 caracteres',

        // Cantidad
        'cant_producto.required' => 'La cantidad es obligatoria',
        'cant_producto.integer'  => 'La cantidad debe ser un número entero',
        'cant_producto.min'      => 'La cantidad debe ser al menos 1',

        // Precio
        'pre_producto.required'  => 'El precio es obligatorio',
        'pre_producto.numeric'   => 'El precio debe ser un valor numérico',
        'pre_producto.min'       => 'El precio no puede ser negativo',
        ];
    }
}
