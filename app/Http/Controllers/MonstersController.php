<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Type_Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Monster;

class MonstersController extends Controller
{
    /**
     * Отображение основной страницы с монстрами
     * @return \Illuminate\Contracts\View\View
     */
    public function up() {
        return view("monsters.index", [
            'data' => Type_Monster::all(), 
            "imgs" => Gallery::whereLike("type", "%image%")->get(),
            "monsters" => Monster::all()
        ]);
    }
    

    /**
     * Правила для валидации
     * @return array{images_id: string, name: string, price: string}
     */
    private function rules() {
        return [
            "name" => "required",
            "price" => "integer",
            "images_id" => "required|integer",
        ];
    }
    
    /**
     * Выводимые сообщения для валидации
     * @return array{images_id.integer: string, images_id.required: string, name.required: string, price.integer: string}
     */
    private function message() {
        return [
            "price.integer" => "В поле должны быть только числа",
            "name.required" => "Поле обязательное",
            "images_id.required" => "Вы забыли выбрать изображение",
            "images_id.integer" => "Можно передавать только id"
        ];
    }
    
    /**
     * Явное создание валидатора
     * @param mixed $request
     * @return \Illuminate\Validation\Validator
     */
    protected function ValidateMake($request) {
         return Validator::make(
            $request->all(),
            $this->rules(),
            $this->message()
        );
    }
    
    /**
     * Создание нового монстра
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        $validate = $this->ValidateMake($request);
        
        if ($validate->passes()) {
            $bb = new Monster($request->all());
            $bb->save();
            return back()->with(['message' => "Добавление прошло удачно!"]);
        }
        elseif($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
    }

    // protected function data() {
    //     return Monster::select(
    //         'monsters.name',
    //         "monsters.price",
    //         "gallery.path",
    //         "type_monsters.element",
    //         "type_monsters.size",
    //         "type_monsters.type",
    //         "type_monsters.can_summons_minions as tm_minions",
    //         "type_monsters.description",
    //         "type_monsters.recommendations"
    //     )
    //     ->join('gallery', 'gallery.id', '=', 'monsters.images_id')
    //     ->join('type_monsters', "type_monsters.id", "=", 'monsters.types_id');
    // }
    
    /**
     * Вывод информации о монстрах с их типами
     * @return \Illuminate\Database\Eloquent\Builder<Monster>
     */
    public function data() {
        return Monster::with("gallery")
        ->with("type_monsters");
    }
    
    /**
     * Нахождение монстра по id (+ тип)
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Request $request) {
        // $info = $this->data()->where("monsters.id", $request->monster)->get();
        $info = $this->data()->find($request->monster);
        return view("monsters.detail", ['data' => $info]);
    }
    
    /**
     * Обновление информации и монстре
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Monster $monster
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Monster $monster) {
        $validate = $this->ValidateMake($request);
        if ($validate->passes()) {
            $monster->update($request->all());
            return redirect()->route("monsters");
        }
        else {
            return back()->withErrors($validate)->withInput();
        }
    }
    
    /**
     * Страница с редактированием о монстре
     * @param \App\Models\Monster $monster
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Monster $monster) {
        return view("monsters.edit", [
            'data' => $monster,
            'type' => Type_Monster::all(), 
            "imgs" => Gallery::whereLike("type", "%image%")->get(),
        ]);
    }
    
    /**
     * Удаление монстра
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request) {
        Monster::destroy($request->check);
        return back();
    }
}
