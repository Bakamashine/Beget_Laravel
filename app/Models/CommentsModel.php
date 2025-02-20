<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель с комментариями
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $comment
 * @property int|null $score_id
 * @property int|null $answer_user_id
 * @property string|null $answer_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereAnswerText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereAnswerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereScoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommentsModel whereUserId($value)
 * @mixin \Eloquent
 */
class CommentsModel extends Model
{
    protected $fillable = [
        "user_id",
        "title",
        "comment",
        "score_id",
    ];

    protected $table = "comments";
}
