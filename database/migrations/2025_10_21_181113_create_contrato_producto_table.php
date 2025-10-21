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
        Schema::create('contrato_producto', function (Blueprint $table) {
            $table->id();
            $table->double("mensualidad");
            $table->unsignedBigInteger("id_producto");
            $table->unsignedBigInteger("id_contrato");
            $table->timestamps();

            $table->foreign("id_contrato")->on("contrato")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato_producto');
    }
};
