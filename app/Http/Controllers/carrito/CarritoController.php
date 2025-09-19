<?php

namespace App\Http\Controllers\carrito;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarritoRequest;
use App\Http\Requests\UpdateCarritoRequest;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
   {
    $carrito = Carrito::with('items.producto')
        ->where('usuario_id', auth()->id())
        ->first(); // un carrito por usuario

    return view('carrito.index', compact('carrito'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarritoRequest $request)
   {
    $carrito = Carrito::firstOrCreate([
        'usuario_id' => auth()->id(),
    ]);

    $carrito->items()->create([
        'producto_id' => $request->producto_id,
        'cantidad' => $request->cantidad,
    ]);

    return redirect()->route('carrito.index')
                     ->with('success', 'Producto agregado al carrito.');
}
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrito $carrito)
{
    $carrito->load('items.producto'); // 👈 carga ítems y productos
    return view('carrito.edit', compact('carrito'));
}
    public function update(UpdateCarritoRequest $request, Carrito $carrito)
    {
    // Validar que existan cantidades
    $cantidades = $request->input('cantidades', []);

    foreach ($cantidades as $itemId => $cantidad) {
        // Buscar el item en este carrito
        $item = $carrito->items()->where('id_item', $itemId)->first();

        if ($item) {
            $item->cantidad = $cantidad;
            $item->save();
        }
    }

    return redirect()->route('carrito.index')
                     ->with('success', 'Carrito actualizado correctamente.');
}
    public function destroy(Carrito $carrito)
    {
        //
    }
    public function vaciar()
{
    $carrito = \App\Models\Carrito::where('usuario_id', auth()->id())->first();

    if ($carrito) {
        $carrito->items()->delete(); // elimina todos los items relacionados
    }

    return redirect()->route('carrito.index')->with('success', 'Carrito vaciado correctamente.');
}


}
