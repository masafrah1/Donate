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
                ->bigInteger('program_id')
                ->unsigned()
                ->after('payment_method');
            $table
                ->string('pay_type')
                ->nullable()
                ->after('program_id');
            $table
                ->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dropColumn('program');
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
            $table->dropColumn('program_id');
            $table->dropColumn('pay_type');
            $table->dropForeign('leaders_program_id_foreign');
            $table->string('program', 255)->after('amount');
        });
    }
};
