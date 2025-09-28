<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'COD_PROD'         => 'required|string|max:50|unique:productos,COD_PROD,' . $this->producto->id,
            'NOM_PROD'         => 'required|string|max:100',
            'PRECIO_PROD'      => 'required|numeric|min:0',
            'CANTIDAD_PROD'    => 'required|integer|min:0',
            'CADUCIDAD_PROD'   => 'nullable|date',
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
