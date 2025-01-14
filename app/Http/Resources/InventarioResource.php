<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo' => $this->tipo,
            'cantidad'=> $this->cantidad,
            'cantidad_disponible'=>$this->cantidad_disponible,
            'ubicacion'=>$this->ubicacion,
            'producto_id'=>$this->producto_id,
            'user_id'=>$this->user_id,
            'status'=>$this->status,
        ];
    }
}
