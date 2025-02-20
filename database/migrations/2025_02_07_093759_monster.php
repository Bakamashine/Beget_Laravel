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
        
        Schema::create("gallery", function (Blueprint $table) {
            $table->id();
            $table->string("path");
            $table->string("name");
            $table->string("type");
        });
        
        Schema::create("type_monsters" , function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->string("speed")->nullable();
            $table->string("element")->nullable();
            $table->text("description")->nullable();
            $table->text("resist")->nullable();
            $table->string("size")->nullable();
            $table->boolean("can_summons_minions")->nullable();
            $table->text("recommendations")->nullable();
        });

        Schema::create("monsters", function (Blueprint $table) {
            $table->id();
            $table->string("name");

            $table->foreignId("types_id")
            ->nullable()
            ->references("id")
            ->on("type_monsters")
            ->onDelete("set null");

            $table->foreignId("images_id")
            ->nullable()
            ->references("id")
            ->on("gallery")
            ->onDelete("set null");

            $table->integer("price");
            $table->integer("discount")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("monsters");
        Schema::dropIfExists("type_monsters");
        Schema::dropIfExists("gallery");
    }
};
