<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up(): void
    {
        Schema::create('envio_servicios', function (Blueprint $table) {
            $table->string('nombre', 120);
            $table->unsignedSmallInteger('tiempo_envio'); 
            $table->decimal('coste_base', 10, 2);
            $table->boolean('activo')->default(true);

            $table->foreignId('id_usuario')
                  ->nullable()
                  ->constrained('users', 'id')
                  ->nullOnDelete();              // si borran user -> pone NULL

            $table->timestamps();
            $table->softDeletes();
            
            $table->index('activo');
            $table->index('id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envio_servicios');
    }
};
