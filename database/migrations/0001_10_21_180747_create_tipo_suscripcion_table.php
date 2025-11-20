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
        Schema::create('tipo_suscripcion', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->double("precio");
            $table->text("descripcion");
            $table->string("imagen")->nullable();
            $table->softDeletes();
            $table->timestamps();
            //crear reseñas asociado a usuarios
            //crear informacion adiccional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_suscripcion');
    }
};
