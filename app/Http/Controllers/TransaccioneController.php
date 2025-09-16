<?php

namespace App\Http\Controllers;

use App\Models\Transaccione;
use Illuminate\Http\Request;

class TransaccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $transacciones = Transaccione::with(['usuario', 'producto'])->get();
        return view('transacciones.index', compact('transacciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $productos = Producto::all();
        return view('transacciones.create', compact('usuarios', 'productos'));
    }

    public function store(TransaccioneRequest $request)
    {
        Transaccione::create($request->validated());
        return redirect()->route('transacciones.index')->with('success', 'Transacción creada correctamente');
    }


    public function show(Transaccione $transaccione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaccione $transaccione)
    {
                $usuarios = Usuario::all();
        $productos = Producto::all();
        return view('transacciones.edit', compact('transaccione', 'usuarios', 'productos'));
    }

   
    public function update(TransaccioneRequest $request, Transaccione $transaccione)
    {
        $transaccione->update($request->validated());
        return redirect()->route('transacciones.index')->with('success', 'Transacción actualizada correctamente');
    }

    public function destroy(Transaccione $transaccione)
    {
        $transaccione->delete();
        return redirect()->route('transacciones.index')->with('success', 'Transacción eliminada correctamente');
    }
}
