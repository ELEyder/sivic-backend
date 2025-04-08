<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
        });

        DB::table('estados')->insert([
            ['nombre' => 'Recibido', 'descripcion' => 'El caso ha sido recibido'],
            ['nombre' => 'Leído', 'descripcion' => 'El caso ha sido leído y esta en proceso de ser resuelto.'],
            ['nombre' => 'Atendido', 'descripcion' => 'El caso ha sido atendido y está en proceso de resolución.'],
            ['nombre' => 'Resuelto', 'descripcion' => 'El caso ha sido completamente resuelto.'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
};
