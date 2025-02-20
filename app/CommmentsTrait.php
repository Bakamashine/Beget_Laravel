<?php

namespace App;
use App\Models\CommentsModel;

trait CommmentsTrait
{
    /**
     * Запрос с выводом информации о:
     * Коментарии
     * Пользователе
     * Ролях
     * @return CommentsModel
     */
    public function CommentsWithJSON() {
        return CommentsModel::select([
            'comments.answer_text', 
            'comments.answer_user_id', 
            'comments.comment', 
            'comments.title', 
            'comments.id', 
            'comments.created_at', 
            'comments_image.images',
            "users.name as u_name",
            "roles.role"
            ])
            ->join('comments_image', 'comments_image.id', '=', 'comments.score_id')
            ->leftJoin("users", "comments.answer_user_id", "=", "users.id")
            ->leftJoin("roles", "users.id", "=", "roles.id")
            ->orderByDesc('comments.created_at')
            ;
    }
}
