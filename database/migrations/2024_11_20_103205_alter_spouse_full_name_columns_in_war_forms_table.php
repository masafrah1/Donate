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
                // Drop the old spouse_full_name column
                $table->dropColumn('spouse_full_name');

                // Add new columns for spouse first, second, third, and family names
                $table->string('spouse_first_name')->nullable()->after('identity_number');
                $table->string('spouse_second_name')->nullable()->after('spouse_first_name');
                $table->string('spouse_third_name')->nullable()->after('spouse_second_name');
                $table->string('spouse_family_name')->nullable()->after('spouse_third_name');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('war_forms', function (Blueprint $table) {
            Schema::table('war_forms', function (Blueprint $table) {
                // Restore the spouse_full_name column
                $table->string('spouse_full_name')->after('identity_number');

                // Drop the new spouse name columns
                $table->dropColumn(['spouse_first_name', 'spouse_second_name', 'spouse_third_name', 'spouse_family_name']);
            });
        });
    }
};
