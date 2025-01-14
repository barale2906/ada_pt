<?php

namespace App\Http\Controllers;

use App\Contracts\InventarioInterface;
use App\Http\Requests\InventarioRequest;
use App\Http\Resources\InventarioResource;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    protected $inventarioService;

    public function __construct(InventarioInterface $inventarioService)
    {
        $this->inventarioService = $inventarioService;
    }

    /**
     * Muestra todas las inventarios
     */
    public function index()
    {
        $inventarios = $this->inventarioService->obtenerTodos();
        return InventarioResource::collection($inventarios);
    }

    /**
     * Muestra la inventario recien creada
     */
    public function store(InventarioRequest $request)
    {
        $inventario = $this->inventarioService->guardar($request->validated());
        return new InventarioResource($inventario);
    }

    /**
     * Muestra la inventario especifica
     */
    public function show(Inventario $inventario)
    {
        $inventario = $this->inventarioService->obtenerPorId($inventario->id);
        return new InventarioResource($inventario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventarioRequest $request, Inventario $inventario)
    {
        $inventario = $this->inventarioService->actualizar($inventario->id, $request->validated());
        return new InventarioResource($inventario);
    }

    /**
     * elimina la inventario seleccionada
     */
    public function destroy(Inventario $inventario)
    {
        $this->inventarioService->eliminar($inventario->id);
        return response()->json($inventario, 204);
    }
}
