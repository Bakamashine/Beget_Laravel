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
        
        Schema::create("comments_image", function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string("name");
            $blueprint->string("images");
        });
        
        DB::table("comments_image")->insert([
            [
                "name" => "dislike",
                "images" => "/emoc/dislike.png",
            ] ,
            [
                "name" => "neutral",
                "images" => "/emoc/avatar.png",
            ] ,
            [
                "name" => "like",
                "images" => "/emoc/like.png",
            ] ,
            ]);
        /**
         * Айди
         * Айди пользователя который оставил отзыв
         * Сам отзыв
         * Оценка
         * Айди монстра на которого был оставлен отзыв
         * Айди модератора или администратора который ответил на данный отзыв
         * Текст оставленного ответа
         */

        Schema::create('comments', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->integer("user_id");
            $blueprint->string("title");
            $blueprint->longText("comment");

            $blueprint->foreignId("score_id")
            ->nullable()
            ->references("id")
            ->on("comments_image")
            ->onDelete("set null");

            $blueprint->foreignId("answer_user_id")
            ->nullable()
            ->references("id")
            ->on("users")
            ->onDelete("set null");
            
            $blueprint->longText("answer_text")
            ->nullable();
            
            $blueprint->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("comments");
        Schema::dropIfExists("comments_image");
    }
};
