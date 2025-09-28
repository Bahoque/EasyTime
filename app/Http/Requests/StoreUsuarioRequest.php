<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
    
        return true;
    }

    public function rules(): array
    {
        return [
            'NOM_USER'         => 'nullable|string|max:50',
            'APE_USER'         => 'required|string|max:100',
            'NUMERO_DOC'       => 'required|string|alpha_num|unique:usuario,NUMERO_DOC',
            'ROL_USER'         => 'required|in:Administrador,Cliente,Jefe de Patio',
            'TEL_USER'         => 'required|string|max:45',
            'CORREO_USER'      => 'required|string|max:50|unique:usuario,CORREO_USER',
            'TIPO_DOC'         => 'required|in:Cedula Ciudadania,Tarjeta Identidad,Permiso de Proteccion Temporal,Cedula Extranjeria,Pasaporte,NIT',
    
        ];
    }

    public function messages(): array
    {
        return [
            'NOM_USER.required'      => 'El nombre del Usuario es obligatorio.',
            'APE_USER.required'   => 'El apellido es obligatorio.',
            'CORREO_USER.required' => 'El Usuario debe tener un correo.',
            'TEL_USER.required' => 'El Usuario debe tener un numero de telefono.',
            'ROL_USER.required' => 'Debes Asigarle un rol al usuario.',
            'NUMERO_DOC.unique' => 'Este número de documento ya está registrado.',
            'CORREO_USER.unique' => 'Este correo electrónico ya está registrado.',

        ];
    }
}
