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
        Schema::table('offline_accounts', function (Blueprint $table) {
            $table
                ->bigInteger('program_id')
                ->unsigned()
                ->after('beneficiary');
            $table
                ->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offline_accounts', function (Blueprint $table) {
            $table->dropColumn('program_id');
            $table->dropForeign('offline_accounts_program_id_foreign');
        });
    }
};
