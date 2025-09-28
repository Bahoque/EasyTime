<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Support\Facades\Log;


class ProductoController extends Controller
{
    /**
     * Mostrar listado de productos
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Guardar un nuevo producto
     */
    public function store(StoreProductoRequest $request)
    {
        
        Log::info('Se ejecutó el método store del controlador ProductoController');
        Producto::create($request->validated());        
        return redirect()->route('producto.index')->with('ok','Producto creado');

    //      $request->validate([
    //         'COD_PROD' => 'required|string|max:50',
    //         'NOM_PROD' => 'required|string|max:255',
    //         'DESCRIPCION_PROD' => 'nullable|string',
    //         'CADUCIDAD_PROD' => 'required|date',
    //         'PRECIO_PROD' => 'required|numeric',
    //         'CANTIDAD_PROD' => 'required|integer',
    //         'INVENTARIO_ID_INVENTARIO' => 'required|integer|exists:inventario,ID_INVENTARIO',
    //     ]);

    //     Producto::create($request->only([
    //         'COD_PROD',
    //         'NOM_PROD',
    //         'DESCRIPCION_PROD',
    //         'CADUCIDAD_PROD',
    //         'PRECIO_PROD',
    //         'CANTIDAD_PROD',
    //         'INVENTARIO_ID_INVENTARIO'
    //     ]));

    //     return redirect()->route('producto.index')
    //                      ->with('success', 'Producto creado correctamente');
     }

    /**
     * Mostrar detalle de un producto
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit', compact('producto'));
    }

    /**
     * Actualizar un producto
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'COD_PROD' => 'required|string|max:50',
            'NOM_PROD' => 'required|string|max:255',
            'DESCRIPCION_PROD' => 'required|string|max:60',
            
            'PRECIO_PROD' => 'required|numeric',
            'CANTIDAD_PROD' => 'required|integer',
            'INVENTARIO_ID_INVENTARIO' => 'required|integer|exists:inventario,ID_INVENTARIO',
        ]);

        $producto->update($request->only([
            'COD_PROD',
            'NOM_PROD',
            'DESCRIPCION_PROD',
            'CADUCIDAD_PROD',
            'PRECIO_PROD',
            'CANTIDAD_PROD',
            'INVENTARIO_ID_INVENTARIO'
        ]));

        return redirect()->route('producto.index')
                         ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Eliminar un producto
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('producto.index')
                         ->with('success', 'Producto eliminado correctamente');
    }
}