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
        'nombre'   => 'required|string|max:50',
        'descripcion'   => 'required|string|max:250',
        'precio'   => 'required|numeric|min:0',
        'cantidad'  => 'required|integer|min:1',
        'dias_garantia'  => 'required|integer|min:1',
        'categoria_id'  => 'required|exists:categorias,id_categoria',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        
            
        ];
    }
    
    public function messages()
    {
        return[
            'nombre.required'  => 'El nombre del producto es obligatorio',
        'nombre.max'       => 'El nombre no puede superar los 50 caracteres',


        'descripcion.required'  => 'La descripción es obligatoria',
        'descripcion.max'       => 'La descripción no puede superar los 250 caracteres',


        'cantidad.required' => 'La cantidad es obligatoria',
        'cantidad.integer'  => 'La cantidad debe ser un número entero',
        'cantidad.min'      => 'La cantidad debe ser al menos 1',

    
        'precio.required'  => 'El precio es obligatorio',
        'precio.numeric'   => 'El precio debe ser un valor numérico',
        'precio.min'       => 'El precio no puede ser negativo',

        'dias_garantia.required'  => 'la garantia es obligatora',
        'dias_garantia.numeric'   => 'La garantia debe ser un valor numérico',
        'dias_garantia.min'       => 'La garantia no puede ser negativo',

        'categoria_id.required' => 'La categoría es obligatoria',
'categoria_id.exists'   => 'La categoría seleccionada no es válida',
        ];
    }
}
