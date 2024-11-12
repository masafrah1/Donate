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
        Schema::dropIfExists('model_has_permissions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table
                ->bigInteger('permission_id')
                ->unsigned()
                ->index();
            $table->string('model_type', 255)->index();
            $table
                ->bigInteger('model_id')
                ->unsigned()
                ->index();

            $table->index(['model_id', 'model_type']);
            $table
                ->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
            $table->primary(['permission_id', 'model_id', 'model_type']);
        });
    }
};
