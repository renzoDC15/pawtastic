<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loggable_id');
            $table->string('loggable_type', 500);
            $table->string('field', 50)->nullable();
            $table->string('from', 1000)->nullable();
            $table->string('to', 1000)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_logs');
    }
};
