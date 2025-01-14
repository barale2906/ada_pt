<?php

namespace App\Services;

use App\Contracts\CategoriaInterface;
use App\Models\Categoria;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoriaService implements CategoriaInterface
{
    public function obtenerTodos()
    {
        try {
            return Categoria::with('productos')->get();
        } catch(Exception $exception){
            Log::error('No mostro las categorias'. $exception->getMessage());
        }

    }

    public function obtenerPorId($id)
    {
        return Categoria::with('productos')->findOrFail($id);
    }

    public function guardar(array $data)
    {
        try {
            return Categoria::create($data);

        } catch(Exception $exception){
            Log::error('No se cargo la Categoria'. $exception->getMessage());
        }

    }

    public function actualizar($id, array $data)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->update($data);
            return $categoria;
        } catch(Exception $exception){
            Log::error('Error al actualizar la categoria'. $exception->getMessage());
        }

    }

    public function eliminar($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            return $categoria->delete();
        } catch(Exception $exception){
            Log::error('Error al eliminar la categoria'. $exception->getMessage());
        }
    }
}
