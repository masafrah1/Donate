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
        Schema::table('offline_accounts', function (Blueprint $table) {
             // Rename the existing 'iban' column to 'iban_jod'
             $table->renameColumn('iban', to: 'iban_jod');
            
             // Add new IBAN columns for different currencies
             $table->string(column: 'iban_usd')->nullable()->after('iban_jod');
             $table->string('iban_ils')->nullable()->after('iban_usd');
             $table->string('iban_eur')->nullable()->after('iban_ils');
             $table->string('account_number')->nullable()->after('iban_eur');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offline_accounts', function (Blueprint $table) {
              // Drop newly added columns
              $table->dropColumn('iban_usd');
              $table->dropColumn('iban_ils');
              $table->dropColumn('iban_eur');
              $table->dropColumn('account_number');
  
              // Rename 'iban_jod' back to 'iban'
              $table->renameColumn('iban_jod', 'iban');
        });
    }
};
