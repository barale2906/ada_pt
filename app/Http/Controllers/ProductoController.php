<?php

namespace App\Http\Controllers;

use App\Contracts\ProductoInterface;
use App\Http\Requests\ProductoRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoInterface $productoService)
    {
        $this->productoService = $productoService;
    }

    /**
     * Muestra todas las productos
     */
    public function index()
    {
        $productos = $this->productoService->obtenerTodos();
        return ProductoResource::collection($productos);
    }

    /**
     * Muestra la producto recien creada
     */
    public function store(ProductoRequest $request)
    {
        $producto = $this->productoService->guardar($request->validated());
        return new ProductoResource($producto);
    }

    /**
     * Muestra la producto especifica
     */
    public function show(Producto $producto)
    {
        $producto = $this->productoService->obtenerPorId($producto->id);
        return new ProductoResource($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoUpdateRequest $request, Producto $producto)
    {
        $producto = $this->productoService->actualizar($producto->id, $request->validated());
        return new ProductoResource($producto);
    }

    /**
     * elimina la producto seleccionada
     */
    public function destroy(Producto $producto)
    {
        $this->productoService->eliminar($producto->id);
        return response()->json($producto, 204);
    }
}
