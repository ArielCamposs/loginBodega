<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->string('departamento');
            $table->string('solicitante');
            $table->string('encargado');
            $table->date('fecha');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });

        Schema::create('entrega_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrega_id')->constrained()->onDelete('cascade');
            $table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrega_producto');
        Schema::dropIfExists('entregas');
    }
}
