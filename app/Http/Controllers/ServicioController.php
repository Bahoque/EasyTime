<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use Illuminate\Support\Facades\Log;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicio = Servicio::all();
        return view('servicio.index',compact('servicio'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicioRequest $request)
    {
        Log::info('Se ejecutó el método store del controlador ServicioController');
        Servicio::create($request->validated());        
        return redirect()->route('servicio.index')->with('ok','Servicio creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return view('servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            
            'NOM_SERV' => 'required|string|max:255',
            'DESCP_SERV' => 'nullable|string',
            'PRECIO_SERV' => 'required|numeric',
            'DURACION_SERV' => 'required|string|max:60',
            
            
        
        ]);
        $servicio->UPDATE_AT = now();
        $servicio->save();

        $servicio->update($request->only([
            'NOM_SERV',
            'DESCP_SERV',
            'PRECIO_SERV',
            'DURACION_SERV',
        
        ]));

        return redirect()->route('servicio.index')
                         ->with('success', 'Servicio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
        {

            if ($servicio->citas()->exists()) {
                return redirect()->route('servicio.index')
                                ->with('error', 'No se puede eliminar el servicio porque tiene citas asignadas.');
            }

            $servicio->delete();

            return redirect()->route('servicio.index')
                            ->with('ok', 'Servicio eliminado correctamente.');
        }

}
