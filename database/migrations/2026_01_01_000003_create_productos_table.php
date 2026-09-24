<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 12, 2);
            $table->decimal('precio_oferta', 12, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('categoria', 80)->nullable(); // Buzos, Camisas, etc.
            $table->string('talla', 20)->nullable();     // S, M, L, XL
            $table->string('color', 50)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->boolean('destacado')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
