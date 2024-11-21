<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('war_forms', function (Blueprint $table) {
             // Modify `created_at` and `updated_at` to include millisecond precision
             $table->datetime('created_at', 3)->nullable()->change();
             $table->datetime('updated_at', 3)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('war_forms', function (Blueprint $table) {
            // Revert `created_at` and `updated_at` to regular timestamps
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->change();
        });
    }
};
