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
        // Para SQLite, necesitamos recrear la tabla
        if (DB::getDriverName() === 'sqlite') {
            // Crear tabla temporal con la nueva estructura
            DB::statement('CREATE TABLE produccions_new (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                fecha DATE,
                cantidad_fundas INTEGER,
                producto_id INTEGER,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE SET NULL
            )');
            
            // Copiar datos existentes (solo los que coinciden)
            DB::statement('INSERT INTO produccions_new (id, fecha, producto_id, created_at, updated_at)
                SELECT id, fecha, producto_id, created_at, updated_at FROM produccions');
            
            // Eliminar tabla vieja
            Schema::dropIfExists('produccions');
            
            // Renombrar tabla nueva
            DB::statement('ALTER TABLE produccions_new RENAME TO produccions');
        } else {
            // Para PostgreSQL, MySQL, etc.
            Schema::table('produccions', function (Blueprint $table) {
                // Intentar eliminar foreign key si existe
                try {
                    $table->dropForeign(['compra_id']);
                } catch (\Exception $e) {
                    // La foreign key no existe, continuar
                }
                // Eliminar columnas antiguas
                $table->dropColumn(['cantidad', 'compra_id']);
            });
            
            // Agregar nueva columna cantidad_fundas
            Schema::table('produccions', function (Blueprint $table) {
                $table->integer('cantidad_fundas')->nullable()->after('fecha');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            // Recrear tabla con estructura original
            DB::statement('CREATE TABLE produccions_old (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                cantidad INTEGER,
                fecha DATE,
                producto_id INTEGER,
                compra_id INTEGER,
                created_at TIMESTAMP,
                updated_at TIMESTAMP
            )');
            
            DB::statement('INSERT INTO produccions_old (id, fecha, producto_id, created_at, updated_at)
                SELECT id, fecha, producto_id, created_at, updated_at FROM produccions');
            
            Schema::dropIfExists('produccions');
            DB::statement('ALTER TABLE produccions_old RENAME TO produccions');
        } else {
            Schema::table('produccions', function (Blueprint $table) {
                $table->dropColumn('cantidad_fundas');
                $table->integer('cantidad')->nullable();
                $table->unsignedBigInteger('compra_id')->nullable();
                $table->foreign('compra_id')->references('id')->on('compras')->onDelete('set null');
            });
        }
    }
};

