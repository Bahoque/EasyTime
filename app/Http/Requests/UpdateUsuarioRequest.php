<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
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
            'ROL_USER'         => 'required|in:Administrador,Cliente,Jefe de Patio',
            'TEL_USER'         => 'required|string|max:45',
            'NUMERO_DOC'       => 'required|string|alpha_num|unique:usuario,NUMERO_DOC,' . $usuario->ID_USER . ',ID_USER',
            'CORREO_USER'      => 'required|email|unique:usuario,CORREO_USER,' . $usuario->ID_USER . ',ID_USER',
    
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
            
        ];
    }
}
