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
            $table->unsignedBigInteger("id_contrato");
            $table->double("mensualidad");
            $table->unsignedBigInteger("id_usuario");
            $table->timestamps();


            $table->foreign("id_tipo")->references("id")->on("tipo_suscripcion");

            $table->foreign('id_contrato')
            ->references("id")->on("contrato");
            
            $table->foreign("id_usuario")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripcion');
    }
};
