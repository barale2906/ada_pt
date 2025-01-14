<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('tipo')->default(1)->comment('1 Entrada, 2 Sálida');
            $table->double('cantidad')->comment('Unidades completas o parciales que salgan/entren del producto');
            $table->double('cantidad_disponible')->comment('Saldo del poroducto después de este movimiento');
            $table->string('ubicacion')->comment('lugar de almacenamiento del producto');
            $table->boolean('status')->default(1)->comment(' true último movimiento del producto, false movimientos anteriores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
