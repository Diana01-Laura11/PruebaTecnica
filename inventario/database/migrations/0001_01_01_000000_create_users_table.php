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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRol')->nullable(); // Añadido el campo idRol
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contrasena');
            $table->boolean('estatus')->default(true);
            
            // Si tienes una tabla roles, puedes añadir la restricción de clave foránea
            // $table->foreign('idRol')->references('id')->on('roles');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
