<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo'  => 'required|integer',
            'cantidad' => 'required|numeric',
            'ubicacion'  => 'required|string',
            'producto_id' => 'required|exists:productos,id',
        ];
    }

    public function messages()
    {
        return [
            'tipo.required' => 'Requiere el tipo 1 entrada, 2 Sálida.',
            'tipo.integer' => 'Debe ser un numkero entero 1 o 2',

            'cantidad.required' => 'La cantidad es requerida.',
            'cantiodad.numeric' => 'La cantidad debe ser un numero.',

            'ubicacion.required' => 'La categoria requiere descripcion.',
            'ubicacion.string' => 'La descripcion debe ser una cadena de texto.',

            'producto_id.required' => 'El producto es obligatoria.',
            'producto_id.exists' => 'El producto seleccionado no es válido.',
        ];
    }
}
