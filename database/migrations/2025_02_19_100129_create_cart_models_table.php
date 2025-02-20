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
        Schema::create('cart_models', function (Blueprint $table) {
            $table->id();

            $table->foreignId("users_id")
            ->constrained("id")
            ->on("users")
            ->onDelete("cascade");

            $table->foreignId("monster_id")
            ->nullable()
            ->constrained("id")
            ->on("monsters")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_models');
    }
};
