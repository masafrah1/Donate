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
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('father_name')->nullable();
            $table->string('grand_father_name')->nullable();
            $table->string('family_name');
            $table->string('phone');
            $table->string('email');
            $table->string('currency', 3);
            $table->decimal('amount');
            $table->string('program');
            $table->string('country');
            $table->boolean('is_private')->default(false);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaders');
    }
};
