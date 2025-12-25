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
            DB::statement('CREATE TABLE compras_new (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                fecha DATE,
                insumo TEXT,
                proveedor_id INTEGER,
                cantidad INTEGER,
                unidad TEXT,
                costo_unitario TEXT,
                tipo_de_pago TEXT,
                dias_de_credito INTEGER,
                created_at TIMESTAMP,
                updated_at TIMESTAMP,
                FOREIGN KEY (proveedor_id) REFERENCES proveedores(id) ON DELETE SET NULL
            )');
            
            // Copiar datos existentes (solo los que coinciden)
            DB::statement('INSERT INTO compras_new (id, fecha, cantidad, created_at, updated_at)
                SELECT id, fecha, cantidad, created_at, updated_at FROM compras');
            
            // Eliminar tabla vieja
            Schema::dropIfExists('compras');
            
            // Renombrar tabla nueva
            DB::statement('ALTER TABLE compras_new RENAME TO compras');
        } else {
            // Para PostgreSQL, MySQL, etc.
            Schema::table('compras', function (Blueprint $table) {
                // Primero eliminar columnas antiguas
                $table->dropColumn(['descripcion', 'costo_total', 'cedula']);
            });
            
            // Agregar nuevas columnas (todas nullable para evitar problemas con datos existentes)
            Schema::table('compras', function (Blueprint $table) {
                $table->string('insumo')->nullable()->after('fecha');
                $table->unsignedBigInteger('proveedor_id')->nullable()->after('insumo');
                $table->string('unidad')->nullable()->after('cantidad');
                $table->text('costo_unitario')->nullable()->after('unidad');
                $table->string('tipo_de_pago')->nullable()->after('costo_unitario');
                $table->integer('dias_de_credito')->nullable()->after('tipo_de_pago');
            });
            
            // Agregar foreign key
            Schema::table('compras', function (Blueprint $table) {
                $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('set null');
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
            DB::statement('CREATE TABLE compras_old (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                descripcion TEXT,
                fecha DATE,
                cantidad INTEGER,
                costo_total DECIMAL(12,2),
                cedula TEXT,
                created_at TIMESTAMP,
                updated_at TIMESTAMP
            )');
            
            DB::statement('INSERT INTO compras_old (id, fecha, cantidad, created_at, updated_at)
                SELECT id, fecha, cantidad, created_at, updated_at FROM compras');
            
            Schema::dropIfExists('compras');
            DB::statement('ALTER TABLE compras_old RENAME TO compras');
        } else {
            Schema::table('compras', function (Blueprint $table) {
                $table->dropForeign(['proveedor_id']);
                $table->dropColumn(['insumo', 'proveedor_id', 'unidad', 'costo_unitario', 'tipo_de_pago', 'dias_de_credito']);
                $table->text('descripcion')->nullable();
                $table->decimal('costo_total', 12, 2)->nullable();
                $table->string('cedula');
            });
        }
    }
};
