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
            DB::statement('CREATE TABLE productos_new (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre_producto TEXT NOT NULL,
                PVP1 INTEGER,
                PVP2 INTEGER,
                PVP3 INTEGER,
                created_at TIMESTAMP,
                updated_at TIMESTAMP
            )');
            
            // Copiar datos existentes (solo el id)
            DB::statement('INSERT INTO productos_new (id, created_at, updated_at)
                SELECT id, created_at, updated_at FROM productos');
            
            // Eliminar tabla vieja
            Schema::dropIfExists('productos');
            
            // Renombrar tabla nueva
            DB::statement('ALTER TABLE productos_new RENAME TO productos');
        } else {
            // Para PostgreSQL, MySQL, etc.
            Schema::table('productos', function (Blueprint $table) {
                // Primero eliminar columnas antiguas
                $table->dropColumn(['nombre', 'descripcion', 'precio', 'stock', 'activo', 'idempresa']);
            });
            
            // Agregar nuevas columnas (todas nullable para evitar problemas con datos existentes)
            Schema::table('productos', function (Blueprint $table) {
                $table->string('nombre_producto')->nullable()->after('id');
                $table->integer('PVP1')->nullable()->after('nombre_producto');
                $table->integer('PVP2')->nullable()->after('PVP1');
                $table->integer('PVP3')->nullable()->after('PVP2');
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
            DB::statement('CREATE TABLE productos_old (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT NOT NULL,
                descripcion TEXT,
                precio DECIMAL(12,2) DEFAULT 0,
                stock INTEGER DEFAULT 0,
                activo INTEGER DEFAULT 1,
                idempresa INTEGER,
                created_at TIMESTAMP,
                updated_at TIMESTAMP
            )');
            
            DB::statement('INSERT INTO productos_old (id, created_at, updated_at)
                SELECT id, created_at, updated_at FROM productos');
            
            Schema::dropIfExists('productos');
            DB::statement('ALTER TABLE productos_old RENAME TO productos');
        } else {
            Schema::table('productos', function (Blueprint $table) {
                $table->dropColumn(['nombre_producto', 'PVP1', 'PVP2', 'PVP3']);
                $table->string('nombre');
                $table->text('descripcion')->nullable();
                $table->decimal('precio', 12, 2)->default(0);
                $table->integer('stock')->default(0);
                $table->boolean('activo')->default(true);
                $table->integer('idempresa')->nullable();
            });
        }
    }
};
