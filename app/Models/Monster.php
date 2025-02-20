<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель с монстрами
 *
 * @property int $id
 * @property string $name
 * @property int|null $types_id
 * @property int|null $images_id
 * @property int $price
 * @property int|null $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartModel> $cart
 * @property-read int|null $cart_count
 * @property-read \App\Models\Gallery|null $gallery
 * @property-read \App\Models\Type_Monster|null $type_monsters
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster whereImagesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster whereTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Monster whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Monster extends Model
{
    protected $table = "monsters";
    protected $fillable = [
        "name",
        "types_id",
        "images_id",
        "price",
        "discount"
    ];

    public function type_monsters() {
        return $this->belongsTo(Type_Monster::class, "types_id");
    }
    
    public function gallery() {
        return $this->belongsTo(Gallery::class, "images_id");
    }
    
    public function cart() {
        return $this->hasMany(CartModel::class);
    }
}
