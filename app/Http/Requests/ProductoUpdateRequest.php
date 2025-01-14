<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoUpdateRequest extends FormRequest
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
        $productoId = $this->route('producto') ? $this->route('producto')->id : null;

        return [
            'nombre' => [
                            'required',
                            'string',
                            'max:255',
                            // Verifica que el nombre sea único en la tabla productos
                            'unique:productos,nombre,' . $productoId,
                        ],
            'descripcion' => [
                            'required',
                            'string',
                        ],

            'precio' => [
                            'required',
                            'numeric'
                        ],
            'categoria_id' => [
                                'required',
                                'exists:categorias,id'
                            ],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre ya esta registrado en la base de datos',
            'descripcion.required' => 'El producto requiere descripcion.',
            'descripcion.string' => 'La descripcion debe ser una cadena de texto.',
            'precio.required' => 'El precio es requerido.',
            'precio.numeric' => 'El precio debe ser un numero.',
            'categoria_id.required' => 'La categoria es obligatoria.',
            'categoria_id.exists' => 'La Categoria seleccionada no es válido.',
        ];
    }
}
