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
        Schema::create('clientecreditos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->integer('valor'); // Campo de tipo entero
            $table->integer('cuotas'); // Campo de tipo entero
            $table->integer('valor_cuota')->nullable(); // Campo de tipo entero
            $table->text('descripcion'); // Campo de tipo texto (textarea)
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado','solicitud'])->default('solicitud');
            $table->string('nombre_gerente')->default('No Asignado');
            $table->timestamp('fecha_aprobacion')->nullable();
            $table->string('tipo_credito');
            $table->string('observacion_asesor')->default('No Asignado');
            $table->string('nombre_asesor')->default('No Asignado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientecreditos');
    }
};
