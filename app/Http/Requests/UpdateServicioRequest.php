<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicioRequest extends FormRequest
{
    public function authorize(): bool
    {
    
        return true;
    }

    public function rules(): array
    {
        return [
            'EST_SERV'         => 'nullable|string|max:50',
            'NOM_SERV'         => 'required|string|max:100',
            'DESCP_SERV'       => 'required|string|max:255',
            'PRECIO_SERV'      => 'required|numeric|min:0',
            'DURACION_SERV'    => 'required|string|max:50',    
        ];
    }

    public function messages(): array
    {
        return [
            'NOM_SERV.required'      => 'El nombre del servicio es obligatorio.',
            'PRECIO_SERV.required'   => 'El precio es obligatorio.',
            'DURACION_SERV.required' => 'Debes Definir el tiempo del servicio.',
        ];
    }
}
