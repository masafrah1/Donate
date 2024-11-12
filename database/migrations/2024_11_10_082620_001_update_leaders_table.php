<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leaders', function (Blueprint $table) {
            $table
                ->boolean('donor_type')
                ->default(0)
                ->nullable()
                ->after('id');
            $table->string('company_name')->after('family_name');
            $table
                ->string('first_name', 255)
                ->nullable()
                ->change();
            $table
                ->string('family_name', 255)
                ->nullable()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leaders', function (Blueprint $table) {
            $table->dropColumn('donor_type');
            $table->dropColumn('company_name');
            $table->string('first_name', 255)->change();
            $table->string('family_name', 255)->change();
        });
    }
};
