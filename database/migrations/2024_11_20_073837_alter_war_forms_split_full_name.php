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
            Schema::table('war_forms', function (Blueprint $table) {
                // Drop the old full_name column
                $table->dropColumn('full_name');
    
                // Add new columns for first, second, third, and family names
                $table->string('first_name')->after('identity_number'); // Assuming 'identity_number' is the first column
                $table->string('second_name')->after('first_name');
                $table->string('third_name')->after('second_name');
                $table->string('family_name')->after('third_name');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('war_forms', function (Blueprint $table) {
              // Restore the full_name column
              $table->string('full_name')->after('identity_number'); // Re-adding the original column if needed

              // Drop the new name columns
              $table->dropColumn(['first_name', 'second_name', 'third_name', 'family_name']);
        });
    }
};
