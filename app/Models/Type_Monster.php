<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $type
 * @property string|null $speed
 * @property string|null $element
 * @property string|null $description
 * @property string|null $resist
 * @property string|null $size
 * @property int|null $can_summons_minions
 * @property string|null $recommendations
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Monster> $monster
 * @property-read int|null $monster_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereCanSummonsMinions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereElement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereRecommendations($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereResist($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Type_Monster whereType($value)
 * @mixin \Eloquent
 */
class Type_Monster extends Model
{
    public $timestamps = false;
    public $table = "type_monsters";
    protected $fillable = [
        "type",
        "speed",
        "element",
        "description",
        "resist",
        "size",
        "can_summons_minions",
        "recommendations"
    ];

    public function monster() {
        return $this->hasMany(Monster::class, "types_id");
        
    }
}
