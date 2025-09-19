<?php

namespace App\Http\Controllers\carrito;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarritoRequest;
use App\Http\Requests\UpdateCarritoRequest;

class CarritoController extends Controller
{

    public function index()
   {
    $carrito = Carrito::with('items.producto')
        ->where('usuario_id', auth()->id())
        ->first(); // un carrito por usuario

    return view('carrito.index', compact('carrito'));
}


    public function create()
    {
        //
    }

   
    public function store(StoreCarritoRequest $request)
       {
        // Validar
        $request->validate([
            'producto_id' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1'
        ]);

        // Buscar el producto
        $producto = Producto::findOrFail($request->producto_id);

           $carrito = Carrito::firstOrCreate(
        ['usuario_id' => auth()->id()]
    );

    // Agregar item al carrito
    $carrito->items()->create([
        'producto_id' => $producto->id_producto,
        'cantidad' => $request->cantidad,
        'precio' => $producto->precio
    ]);

    return redirect()->route('carrito.index')
                     ->with('ok', 'Producto añadido al carrito');
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
        $carrito = Carrito::first();
        if ($carrito) {
            $carrito->items()->delete();
        }
        return back()->with('ok', 'Carrito vaciado correctamente');
    }


}
