<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $users_id
 * @property int|null $monster_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gallery> $gallery
 * @property-read int|null $gallery_count
 * @property-read \App\Models\Monster|null $monster
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartModel whereMonsterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartModel whereUsersId($value)
 * @mixin \Eloquent
 */
class CartModel extends Model
{
    protected $fillable = [
        "users_id",
        "monster_id",
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function monster() {
        return $this->belongsTo(Monster::class);
    }
    
    public function gallery() {
        return $this->hasManyThrough(Gallery::class, Monster::class, 'images_id', 'id');

    }

}
