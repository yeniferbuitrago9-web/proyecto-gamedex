<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria; // si tienes tabla categorias
use App\Models\Usuario; // si el producto pertenece a un usuario
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'usuario']) // si tienes relaciones
            ->orderBy('id_producto')
            ->get();

        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        return view('producto.create', [
            'categorias' => Categoria::orderBy('nombre_categoria')->get(['id_categoria', 'nombre_categoria']),
            'usuario'   => Usuario::orderBy('nombre')->get(['id_usuario', 'nombre']),
        ]);
    }

    public function store(StoreProductoRequest $request)
   {
    $data = $request->validated();
    $data['usuario_id'] = auth()->id();
    Producto::create($data);

    return redirect()->route('producto.index')->with('ok', '✅ Producto agregado correctamente');
}

    public function edit(Producto $producto)
    {
        return view('producto.edit', [
            'producto'   => $producto,
            'categoria' => Categoria::orderBy('nombre_categoria')->get(['id_categoria', 'nombre_categoria']),
            'usuario'   => Usuario::orderBy('nombre')->get(['id_usuario', 'nombre']),
        ]);
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());
          if ($request->hasFile('imagen')) {
        $filename = time().'_'.$request->imagen->getClientOriginalName();
        $request->imagen->move(public_path('images/productos'), $filename);
        $data['imagen'] = 'images/productos/'.$filename;
    }
    $producto->update($data);


        return redirect()->route('producto.index')->with('ok', '✅ Producto actualizado');
    }

    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return back()->with('ok', 'Producto eliminado');
        } catch (\Throwable $e) {
            return back()->withErrors('⚠️ No se puede eliminar: tiene registros relacionados.');
        }
    }
    public function dashboard()
{
    $productos = Producto::all(); // Trae todos los productos
    return view('dashboard', compact('productos'));
}
public function show(Producto $producto)
{
    return view('producto.show', compact('producto'));
}
}
