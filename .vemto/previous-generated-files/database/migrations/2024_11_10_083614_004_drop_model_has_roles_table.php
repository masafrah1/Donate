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
        Schema::dropIfExists('model_has_roles');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table
                ->bigInteger('role_id')
                ->unsigned()
                ->index();
            $table->string('model_type', 255)->index();
            $table
                ->bigInteger('model_id')
                ->unsigned()
                ->index();

            $table->index(['model_id', 'model_type']);
            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->primary(['role_id', 'model_id', 'model_type']);
        });
    }
};
