<?php

namespace App\Http\Controllers\C_producto;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with(['inventario'])
        ->orderBy('ID_PRODUCTO')
        ->get();
        return view('producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $productos =>  
        return view('producto.create');

        // $productos = producto::findOrFail($id);
        // return view('producto.edit', compact('productos'));
         
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
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        $productos = producto::findOrFail($ID_PRODUCTO);
        return view('producto.edit', compact('productos'));
         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producto $producto)
    {
        return view('producto.destroy', compact('producto'));
    }
}
