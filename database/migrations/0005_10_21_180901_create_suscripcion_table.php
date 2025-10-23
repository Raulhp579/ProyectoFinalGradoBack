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
        Schema::create('suscripcion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_tipo");
            $table->unsignedBigInteger("id_contrato"); // falta por poner como clave foranea
            $table->double("mensualidad");
            $table->unsignedBigInteger("id_usuario");// falta por poner como clave foranea
            $table->timestamps();


            $table->foreign("id_tipo")->on("tipo_suscripcion")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_suscripcion');
    }
};
