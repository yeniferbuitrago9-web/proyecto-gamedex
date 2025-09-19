<?php

namespace App\Http\Controllers\CarritoItem;

use App\Http\Controllers\Controller;
use App\Models\CarritoItem;
use Illuminate\Http\Request;

class CarritoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CarritoItem $carritoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarritoItem $carritoItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarritoItem $carritoItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(\App\Models\CarritoItem $item)
{
    $item->delete();
    return redirect()->route('carrito.index')->with('success', 'Item eliminado del carrito.');
}
    }

