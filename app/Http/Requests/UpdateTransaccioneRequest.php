<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransaccioneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {
         $id = $this->route('transaccione')->transaccione_id;
        return [
            'tipo' => 'required|string|max:50',
            'id_usuario' => 'required|integer|exists:usuario,id_usuario',
            'id_producto' => 'required|integer|exists:producto,id_producto',
            'metodo_pago' => 'nullable|string|max:100',
            'monto' => 'required|numeric|min:0',
            'garantia' => 'nullable|string|max:255',
            'fecha' => 'required|date',
            'estado' => 'nullable|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'tipo.required' => 'El tipo de transacción es obligatorio.',
            'tipo.string' => 'El tipo debe ser un texto válido.',
            'tipo.max' => 'El tipo no puede exceder los 50 caracteres.',
            
            'id_usuario.required' => 'Debe seleccionar un usuario.',
            'id_usuario.integer' => 'El ID del usuario debe ser un número.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',

            'id_producto.required' => 'Debe seleccionar un producto.',
            'id_producto.integer' => 'El ID del producto debe ser un número.',
            'id_producto.exists' => 'El producto seleccionado no existe.',

            'metodo_pago.string' => 'El método de pago debe ser texto.',
            'metodo_pago.max' => 'El método de pago no puede exceder los 100 caracteres.',

            'monto.required' => 'El monto es obligatorio.',
            'monto.numeric' => 'El monto debe ser un número.',
            'monto.min' => 'El monto debe ser mayor o igual a 0.',

            'garantia.string' => 'La garantía debe ser texto.',
            'garantia.max' => 'La garantía no puede exceder los 255 caracteres.',

            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha no es válida.',

            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede exceder los 50 caracteres.',
        ];
    }
}
