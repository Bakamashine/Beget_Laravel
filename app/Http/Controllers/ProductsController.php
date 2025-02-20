<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Type_Monster;
use App\Rules\null_or_integer;
use Illuminate\Http\Request;
use App\Models\Monster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    
    /** Трейт для использования вывода информации о монстрах */
    use \App\MonstersTraits;

    /**
     * Правила валидации
     * @return array{price_max: null_or_integer, price_min: null_or_integer}
     */
    private function rule() {
        return [
            "price_min" =>  new null_or_integer,
            "price_max" =>  new null_or_integer
        ];
    }
    

    /**
     * Показ основной страницы с монстрами (+ поиск)
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function up(Request $request) {
        
        $validate = Validator::make($request->all(), $this->rule(), attributes: [
            "price_min" => "Поле минимальной суммы",
            "price_max" => "Поле максимальной суммы"
        ]);
        
        if ($validate->passes()) {
        is_numeric($request->price_min) 
        ?: $request->price_min = 0;

        is_numeric($request->price_max) 
        ?: $request->price_max = 1000000;
        
            $data = $this->MonsterData()
            ->where( function ($query) use ($request) {
                $query->whereNone(['types_id', 'images_id'], "=", null, "or");
                $query->whereLike("name", "%$request->name%");
                $query->whereLike("types_id", "%$request->types_id%");
                $query->whereBetween('price', [$request->price_min, $request->price_max]);
            })
            ->paginate(6);

            return view("products",[
                'data' => $data,
                'types' => Type_Monster::all(),
                'search' => new Collection($request->all()),
            ]);
        
        } else {
            return back()->withErrors($validate)->withInput();
        }

    }
    
    /**
     * Детальный показ монстра
     * @param \App\Models\Monster $monster
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Monster $monster) {
        return view("products_detail", ['data' => $monster])                ;
    }
    
    /**
     * Добавление монстров в "Желаемое"
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function addCart(Request $request) {
        $monster_data = Monster::select(['id'])->find($request->id);
        
            Validator::make($request->all(),
            [
                "id" => [
                    function ($name, $value, $fail)  use ($monster_data){
                            $data = CartModel::where('users_id', '=', \Auth::user()->id)
                            ->where('monster_id', '=', $monster_data->id)
                            ->get();

                            if (count($data) == 0) {
                                return;
                            } else {
                                $fail('Монстр уже был добавлен');
                            }
                    }
                ]
            ],
        )->validateWithBag("ErrorAddCart");
        
            CartModel::insert([
                'users_id' => \Auth::user()->id, 
                'monster_id' => $request->id
            ]);
                
            return redirect()->route('products');
        }
}
