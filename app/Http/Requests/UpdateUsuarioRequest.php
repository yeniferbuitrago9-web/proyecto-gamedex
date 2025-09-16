<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
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
             $usuarioId = $this->route('usuario')->id_usuario;

        return [
            'doc_usuario' => 'required|unique:usuario,doc_usuario,' . $usuarioId . ',id_usuario',
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:usuario,email,' . $usuarioId . ',id_usuario',
            'password' => 'nullable|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'doc_usuario.required' => 'El documento es obligatorio.',
            'doc_usuario.unique' => 'Este documento ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.email' => 'El email debe ser una dirección válida.',
            'email.unique' => 'Este email ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',
        ];
    
    }
}
