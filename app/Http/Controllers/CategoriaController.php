<?php

namespace App\Http\Controllers;

use App\Contracts\CategoriaInterface;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaInterface $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    /**
     * Muestra todas las categorias
     */
    public function index()
    {
        $categorias = $this->categoriaService->obtenerTodos();
        return CategoriaResource::collection($categorias);
    }

    /**
     * Muestra la categoria recien creada
     */
    public function store(CategoriaRequest $request)
    {
        $categoria = $this->categoriaService->guardar($request->validated());
        return new CategoriaResource($categoria);
    }

    /**
     * Muestra la categoria especifica
     */
    public function show(Categoria $categoria)
    {
        $categoria = $this->categoriaService->obtenerPorId($categoria->id);
        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        $categoria = $this->categoriaService->actualizar($categoria->id, $request->validated());
        return new CategoriaResource($categoria);
    }

    /**
     * elimina la categoria seleccionada
     */
    public function destroy(Categoria $categoria)
    {
        $this->categoriaService->eliminar($categoria->id);
        return response()->json($categoria, 204);
    }
}
