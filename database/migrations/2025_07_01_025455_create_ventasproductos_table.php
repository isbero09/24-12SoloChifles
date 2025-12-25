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
        Schema::create('ventasproductos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_cedula');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->text('detalle')->nullable();
            $table->decimal('precio', 12, 2)->nullable();
            $table->timestamp('fecha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventasproductos');
    }
};
