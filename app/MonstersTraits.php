<?php

namespace App;
use App\Models\Monster;

trait MonstersTraits
{
    /**
     * Возвращает данные о монстрах при помощи связанных таблиц
     * Возвращает всю информацию о типе монстра 
     * Возвращает картинку
     * @return \Illuminate\Database\Eloquent\Builder<Monster>
     */
    function MonsterData() {
        return Monster::with("gallery")
        ->with("type_monsters");
    }
    
    /**
     * Возвращает данные о монстрах при помощи построителя запросов
     * Возвращает id, name, price, type (type_monsters), path (gallery)
     * @return Monster
     */
    function MonsterDataWithJOIN() {
        return Monster::select([
            'monsters.id',
            'monsters.name',
            'monsters.price',
            'type_monsters.type',
            'gallery.path'
        ])
        ->join('type_monsters' , 'type_monsters.id', '=', 'monsters.types_id')
        ->join('gallery', 'gallery.id', '=', 'monsters.images_id')
        ;
    }
    
}
