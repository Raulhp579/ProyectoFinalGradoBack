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
        Schema::create('producto_review', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_producto");
            $table->text("review");
            $table->timestamps();

            $table->foreign("id_usuario")->references("id")->on("users");
            $table->foreign("id_producto")->references("id")->on("productos");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_review');
    }
};
