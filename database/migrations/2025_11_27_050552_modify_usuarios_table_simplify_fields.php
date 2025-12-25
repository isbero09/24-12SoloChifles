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
        // SQLite no soporta renameColumn ni dropColumn múltiples directamente
        // Necesitamos recrear la tabla
        
        Schema::table('usuarios', function (Blueprint $table) {
            // Agregar nueva columna referencia primero
            $table->string('referencia')->nullable()->after('telefono');
        });
        
        // Para SQLite, necesitamos recrear la tabla
        if (DB::getDriverName() === 'sqlite') {
            // Crear tabla temporal con la nueva estructura
            DB::statement('CREATE TABLE usuarios_new (
                cedula TEXT PRIMARY KEY,
                nombre TEXT NOT NULL,
                direccion TEXT,
                telefono TEXT,
                referencia TEXT,
                created_at TIMESTAMP,
                updated_at TIMESTAMP
            )');
            
            // Copiar datos (copiar nombres a nombre)
            DB::statement('INSERT INTO usuarios_new (cedula, nombre, direccion, telefono, referencia, created_at, updated_at)
                SELECT cedula, nombres, direccion, telefono, NULL, created_at, updated_at FROM usuarios');
            
            // Eliminar tabla vieja
            Schema::dropIfExists('usuarios');
            
            // Renombrar tabla nueva
            DB::statement('ALTER TABLE usuarios_new RENAME TO usuarios');
        } else {
            // Para otros motores de BD (MySQL, PostgreSQL)
            Schema::table('usuarios', function (Blueprint $table) {
                $table->renameColumn('nombres', 'nombre');
                $table->dropColumn(['apellidos', 'email', 'fecha_nacimiento', 'password', 'estado']);
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
            DB::statement('CREATE TABLE usuarios_old (
                cedula TEXT PRIMARY KEY,
                nombres TEXT NOT NULL,
                apellidos TEXT,
                email TEXT UNIQUE,
                fecha_nacimiento DATE,
                direccion TEXT,
                telefono TEXT,
                password TEXT NOT NULL,
                estado INTEGER DEFAULT 1,
                created_at TIMESTAMP,
                updated_at TIMESTAMP
            )');
            
            DB::statement('INSERT INTO usuarios_old (cedula, nombres, direccion, telefono, created_at, updated_at)
                SELECT cedula, nombre, direccion, telefono, created_at, updated_at FROM usuarios');
            
            Schema::dropIfExists('usuarios');
            DB::statement('ALTER TABLE usuarios_old RENAME TO usuarios');
        } else {
            Schema::table('usuarios', function (Blueprint $table) {
                $table->renameColumn('nombre', 'nombres');
                $table->string('apellidos')->nullable();
                $table->string('email')->unique()->nullable();
                $table->date('fecha_nacimiento')->nullable();
                $table->string('password');
                $table->boolean('estado')->default(true);
                $table->dropColumn('referencia');
            });
        }
    }
};
