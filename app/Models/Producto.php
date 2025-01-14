<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos con los movimientos de inventario
     */

    public function inventarios() : HasMany
    {
        return $this->hasMany(Inventario::class);
    }

    /**
     * Relación uno a muchos inversa con la categoria
     */
    public function categoria(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
