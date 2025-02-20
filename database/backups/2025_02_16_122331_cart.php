<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    /**
     * id (int)
     * users_id (int)
     * products (JSON)
     */


    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("cart", function(Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId("users_id")
            ->constrained("id")
            ->on("users")
            ->onDelete("cascade");
            $blueprint->json("products");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("cart");
    }
};
