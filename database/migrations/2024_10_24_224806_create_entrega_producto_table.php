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
        Schema::create('entrega_producto', function (Blueprint $table) {
            $table->id(); // ID de la relación
            $table->foreignId('entrega_id')->constrained('entregas')->onDelete('cascade'); // Clave foránea a la tabla entregas
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Clave foránea a la tabla productos
            $table->integer('cantidad'); // Cantidad de productos entregados
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_producto');
    }
};
