<?php

namespace App\Services;

use App\Contracts\InventarioInterface;
use App\Models\Inventario;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InventarioService implements InventarioInterface
{
    private $saldo;

    public function obtenerTodos()
    {
        try {
            return Inventario::where('status',true)->get();
        } catch(Exception $exception){
            Log::error('No mostro inventarios'. $exception->getMessage());
        }

    }

    public function obtenerPorId($id)
    {
        return Inventario::with('inventarios')->findOrFail($id);
    }

    public function guardar(array $data)
    {
        try {
            $actual=Inventario::where('producto_id',$data['producto_id'])
                                ->where('status', 1)
                                ->orderBY('id', 'DESC')
                                ->first();

            if($data['tipo']===1){
                if($actual){
                    $this->saldo=$actual->cantidad_disponible+$data['cantidad'];
                }else{
                    $this->saldo=$data['cantidad'];
                }

            }else{
                $this->saldo=$actual->cantidad_disponible-$data['cantidad'];
            }

            if($this->saldo>0){
                $actual->update([
                    'status'    => 0
                ]);
                return Inventario::create([
                                    'producto_id'=>$data['producto_id'],
                                    'user_id'=>1,//'user_id'=>Auth::user()->id, Este campo haría su trabajo al momento de configurar la seguridad del sistema
                                    'tipo'=>$data['tipo'],
                                    'cantidad'=>$data['cantidad'],
                                    'cantidad_disponible'=>$this->saldo,
                                    'ubicacion'=>$data['ubicacion'],
                                ]);


            }

        } catch(Exception $exception){
            Log::error('No se cargo inventario'. $exception->getMessage().' Saldo: '.$this->saldo);
        }

    }

    public function actualizar($id, array $data)
    {
        try {
            $inventario = Inventario::findOrFail($id);
            $inventario->update($data);
            return $inventario;
        } catch(Exception $exception){
            Log::error('Error al actualizar inventario'. $exception->getMessage());
        }

    }

    public function eliminar($id)
    {
        try {
            $inventario = Inventario::findOrFail($id);
            return $inventario->delete();
        } catch(Exception $exception){
            Log::error('Error al eliminar inventario'. $exception->getMessage());
        }
    }
}
