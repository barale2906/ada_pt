<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'nombre'  => 'required|string|unique:categorias,nombre',
            'descripcion'  => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la categoria es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre ya esta registrado en la base de datos',
            'descripcion.required' => 'La categoria requiere descripcion.',
            'descripcion.string' => 'La descripcion debe ser una cadena de texto.',
        ];
    }
}
