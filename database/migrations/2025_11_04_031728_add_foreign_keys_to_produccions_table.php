<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produccions', function (Blueprint $table) {
            // Agregar foreign keys si las tablas existen
            if (Schema::hasTable('productos') && Schema::hasColumn('produccions', 'producto_id')) {
                try {
                    $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');
                } catch (\Exception $e) {
                    // La foreign key ya existe, ignorar
                }
            }
            
            if (Schema::hasTable('compras') && Schema::hasColumn('produccions', 'compra_id')) {
                try {
                    $table->foreign('compra_id')->references('id')->on('compras')->onDelete('set null');
                } catch (\Exception $e) {
                    // La foreign key ya existe, ignorar
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produccions', function (Blueprint $table) {
            try {
                $table->dropForeign(['producto_id']);
            } catch (\Exception $e) {
                // La foreign key no existe, ignorar
            }
            try {
                $table->dropForeign(['compra_id']);
            } catch (\Exception $e) {
                // La foreign key no existe, ignorar
            }
        });
    }
};
