<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Log;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuario::all();
        return view('usuario.index',compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Se ejecutó el método store del controlador UsuarioController');

        $data = $request->validate([
            'NUMERO_DOC' => 'required|string|alpha_num|unique:usuario,NUMERO_DOC',
            'TIPO_DOC' => 'required|in:Cedula Ciudadania,Tarjeta Identidad,Permiso de Proteccion Temporal,Cedula Extranjeria,Pasaporte,NIT',
            'NOM_USER' => 'required|string|max:45',
            'APE_USER' => 'required|string|max:45',
            'CORREO_USER' => 'required|string|email|max:45|unique:usuario,CORREO_USER',
            'TEL_USER' => 'required|string|max:45',
            'ROL_USER' => 'required|in:Administrador,Cliente,Jefe de Patio',
        ], [
            'NUMERO_DOC.unique' => 'Este número de documento ya está registrado.',
            'CORREO_USER.unique' => 'Este correo electrónico ya está registrado.',
        ]);



    $data['EST_USER'] = 1; // Estado activo por defecto

    Usuario::create($data);

    return redirect()->route('usuario.index')->with('ok', 'Usuario creado');
}




    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    
        {
        $request->validate([
            
                'NUMERO_DOC' => 'required|string|alpha_num|unique:usuario,NUMERO_DOC,' . $usuario->ID_USER . ',ID_USER',
                'CORREO_USER' => 'required|string|email|max:60|unique:usuario,CORREO_USER,' . $usuario->ID_USER . ',ID_USER',
                'NOM_USER' => 'required|string|max:255',
                'APE_USER' => 'required|string|max:255',
                'TEL_USER' => 'required|string|max:45',
                'ROL_USER' => 'required|in:Administrador,Cliente,Jefe de Patio',
                'TIPO_DOC' => 'required|in:Cedula Ciudadania,Tarjeta Identidad,Permiso de Proteccion Temporal,Cedula Extranjeria,Pasaporte,NIT',
            ], [
                'NUMERO_DOC.unique' => 'Este número de documento ya está registrado.',
                'CORREO_USER.unique' => 'Este correo electrónico ya está registrado.',
            ]);

        $usuario->UPDATE_AT = now();
        $usuario->save();

        $usuario->update($request->only([
            'NOM_USER',
            'APE_USER',
            'TEL_USER',
            'ROL_USER',
            'CORREO_USER',
            'NUMERO_DOC',
            'TIPO_DOC',
            'ROL_USER',

        
        ]));

        return redirect()->route('usuario.index')
                         ->with('success', 'Usuario actualizado correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
            {

            if ($usuario->citas()->exists()) {
                return redirect()->route('usuario.index')
                                ->with('error', 'No se puede eliminar el Usuario porque tiene alguna cita asignada.');
            }

            $usuario->delete();

            return redirect()->route('usuario.index')
                            ->with('ok', 'Usuario eliminado correctamente.');
             } 
}
