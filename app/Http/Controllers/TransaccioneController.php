<?php

namespace App\Http\Controllers;

use App\Models\Transaccione;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;
use App\Http\Requests\StoreTransaccioneRequest;
use App\Http\Requests\UpdateTransaccioneRequest;
use App\Enums\TipoTransaccion;


class TransaccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $transaccione = Transaccione::with(['usuario', 'producto'])->get();
        return view('transaccione.index', compact('transaccione'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $productos = Producto::all();
        $tipos = TipoTransaccion::cases();
        return view('transaccione.create', compact('tipos', 'usuarios', 'productos'));
    }

    public function store(TransaccioneRequest $request)
    {
        
        Transaccione::create($request->validated());
        return redirect()->route('transaccione.index')->with('success', 'Transacción creada correctamente');
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
         $tipos = TipoTransaccion::cases();
         

        return view('transaccione.edit', compact('transaccione', 'usuarios', 'productos','tipos'));
    }

   
    public function update(TransaccioneRequest $request, Transaccione $transaccione)
    {
        $transaccione->update($request->validated());
        return redirect()->route('transaccione.index')->with('success', 'Transacción actualizada correctamente');
    }

    public function destroy(Transaccione $transaccione)
    {
        $transaccione->delete();
        return redirect()->route('transaccione.index')->with('success', 'Transacción eliminada correctamente');
    }

    
}
