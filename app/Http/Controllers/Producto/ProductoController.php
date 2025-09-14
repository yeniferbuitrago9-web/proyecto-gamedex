<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{

    public function index()
   {
        $productos = Producto::all();
        return view('producto.index', compact('productos')); 
    }

    public function create()
    {
     return view('producto.create');
    }
    public function store(StoreProductoRequest $request)
    {
        $data = $request->validated();
       Producto::create([
        'nom_producto'        => $data['nom_producto'],
        'des_producto'        => $data['des_producto'],
        'cant_producto'       => $data['cant_producto'],
        'pre_producto'        => $data['pre_producto'],

        // Valores por defecto
        'ima_producto'        => 'default.png',
        'est_producto'        => 1,
        'id_categoria'        => 1,
        'usuarios_id_usuario' => auth()->id() ?? 1,
    ]);

    return redirect()->route('producto.index')->with('ok', '✅ Producto agregado correctamente');
    }
    public function show(Producto $producto)
    {
        //
    }

    public function edit(Producto $producto)
    {
          return view('producto.edit', compact('producto'));
    
    }

 
    public function update(Request $request, Producto $producto)
    {
         $validated = $request->validate([
        'nom_producto' => 'required|string|max:255',
        'des_producto' => 'nullable|string',
        'pre_producto' => 'required|numeric|min:0',
        'cant_producto' => 'required|integer|min:0',
        'id_categoria' => 'required|exists:categorias,id_categoria',
    ]);

    $producto->update($validated);

    return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente');
}
    public function destroy(Producto $producto)
    {
         $producto->delete();
        return redirect()->route('producto.index')->with('success', 'Producto eliminado.');
    }
}
