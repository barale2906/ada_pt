<?php

namespace App\Services;

use App\Contracts\ProductoInterface;
use App\Models\Producto;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductoService implements ProductoInterface
{
    public function obtenerTodos()
    {
        try {
            return Producto::with('inventarios')->get();
        } catch(Exception $exception){
            Log::error('No mostro productos'. $exception->getMessage());
        }

    }

    public function obtenerPorId($id)
    {
        return Producto::with('inventarios')->findOrFail($id);
    }

    public function guardar(array $data)
    {
        try {
            return Producto::create($data);

        } catch(Exception $exception){
            Log::error('No se cargo Producto'. $exception->getMessage());
        }

    }

    public function actualizar($id, array $data)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->update($data);
            return $producto;
        } catch(Exception $exception){
            Log::error('Error al actualizar producto'. $exception->getMessage());
        }

    }

    public function eliminar($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            return $producto->delete();
        } catch(Exception $exception){
            Log::error('Error al eliminar producto'. $exception->getMessage());
        }
    }
}
