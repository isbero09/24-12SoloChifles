<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Only rename if the old table exists and the new one doesn't to avoid errors
        if (Schema::hasTable('u_s_u_a_r_i_o_s') && ! Schema::hasTable('usuarios')) {
            Schema::rename('u_s_u_a_r_i_o_s', 'usuarios');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('usuarios') && ! Schema::hasTable('u_s_u_a_r_i_o_s')) {
            Schema::rename('usuarios', 'u_s_u_a_r_i_o_s');
        }
    }
};
