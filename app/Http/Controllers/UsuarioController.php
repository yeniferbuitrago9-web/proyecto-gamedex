<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller

{
    public function index()
    {
        $usuarios = Usuario::orderBy('id_usuario')->get();
        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(StoreUsuarioRequest $request)
    {
        Usuario::create([
            'doc_usuario' => $request->doc_usuario,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('usuario.index')->with('ok', 'Usuario creado');
    }

    public function edit(Usuario $usuario)
    {
        return view('usuario.edit', compact('usuario'));
    }

    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->doc_usuario = $request->doc_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->telefono = $request->telefono;
        $usuario->save();

        return redirect()->route('usuario.index')->with('ok', 'Usuario actualizado');
    }

    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return back()->with('ok', 'Usuario eliminado');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}