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
        Schema::create('historial_uso', function (Blueprint $table) {
            $table->id('id_historial');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_vehiculo');
            $table->unsignedBigInteger('id_espacio');
            $table->dateTime('fecha_entrada');
            $table->dateTime('fecha_salida')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->onDelete('cascade');
            $table->foreign('id_espacio')->references('id_espacio')->on('espacios_parqueadero')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_uso');
    }
};
