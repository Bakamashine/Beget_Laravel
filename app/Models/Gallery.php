<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель с галереей
 *
 * @property int $id
 * @property string $path
 * @property string $name
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Monster> $monsters
 * @property-read int|null $monsters_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gallery whereType($value)
 * @mixin \Eloquent
 */
class Gallery extends Model
{
    public $table = "gallery";
    public $timestamps = false;
    protected $fillable = [
        "path",
        "type",
        "name"
    ];
    
    public function monsters() {
        return $this->hasMany(Monster::class);
    }
    
}
