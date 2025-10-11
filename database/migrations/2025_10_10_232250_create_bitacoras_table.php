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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('restrict');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('restrict');
            $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('restrict');
            $table->date('fecha');
            $table->text('contenido');
            $table->string('material_apoyo')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
