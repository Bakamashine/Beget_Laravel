<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

/**
 * 
 *
 * @property int $id
 * @property int $users_id
 * @property string $monsters
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ZayavkiModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ZayavkiModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ZayavkiModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ZayavkiModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ZayavkiModel whereMonsters($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ZayavkiModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ZayavkiModel whereUsersId($value)
 * @mixin \Eloquent
 */
class ZayavkiModel extends Model
{
    public $timestamps = false;
    protected $fillable =  [
        "users_id",
        "monsters",
        "status"
    ];

}
