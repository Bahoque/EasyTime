<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
    
        return true;
    }

    public function rules(): array
    {
        return [
            'COD_PROD'         => 'required|string|max:50|unique:productos,COD_PROD',
            'NOM_PROD'         => 'required|string|max:100',
            'DESCRIPCION_PROD' => 'required|string|max:255',
            'PRECIO_PROD'      => 'required|numeric|min:0',
            'CANTIDAD_PROD'    => 'required|integer|min:0',
            'CADUCIDAD_PROD' => 'nullable|date',
            'INVENTARIO_ID_INVENTARIO'   => 'nullable|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'NOM_PROD.required'      => 'El nombre del producto es obligatorio.',
            'PRECIO_PROD.required'   => 'El precio es obligatorio.',
            'CANTIDAD_PROD.required' => 'La cantidad es obligatoria.',
        ];
    }
}


