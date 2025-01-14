<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventario extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos inversa con el producto
     */

    public function producto(): BelongsTo
    {
        return $this->BelongsTo(Producto::class);
    }

    /**
     * Relación uno a muchos inversa con el usuario creador
     */

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

}
