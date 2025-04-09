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
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('nombre_completo');
            $table->string('genero');
            $table->string('telefono');
            $table->string('nacionalidad');
            $table->string('direccion');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('lugar_caso');
            $table->text('descripcion');
            $table->boolean('autorizacion_comunicacion');
            $table->boolean('autorizacion_copia_reporte');
            $table->timestamp('fecha_atencion')->nullable();;
            $table->timestamp('fecha_resolucion')->nullable();;
            $table->string('asignado')->nullable();
            $table->text('resolucion')->nullable();
            $table->string('resolucion_url')->nullable();
            $table->foreignId('tipo_caso_id')->constrained('tipos_caso', 'id')->onDelete('restrict');
            $table->foreignId('estado_id')->constrained('estados', 'id')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casos');
    }
};
