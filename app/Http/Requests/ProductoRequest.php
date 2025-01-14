<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación para crear un producto
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'  => 'required|string|unique:categorias,nombre',
            'descripcion'  => 'required|string',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre ya esta registrado en la base de datos',
            'descripcion.required' => 'La categoria requiere descripcion.',
            'descripcion.string' => 'La descripcion debe ser una cadena de texto.',
            'precio.required' => 'El precio es requerido.',
            'precio.numeric' => 'El precio debe ser un numero.',
            'categoria_id.required' => 'La categoria es obligatoria.',
            'categoria_id.exists' => 'La Categoria seleccionada no es válido.',
        ];
    }

}
