<?php

namespace App\Http\Controllers;

use App\Rules\null_or_integer;
use Illuminate\Http\Request;
use App\Models\Type_Monster;
use Illuminate\Support\Facades\Validator;

class Type_MonsterController extends Controller
{
    /**
     * Показ основной страницы с типами монстров
     * @return \Illuminate\Contracts\View\View
     */
    public function up(){
        $data = Type_Monster::all();
        return view("type_monsters.index", ['types' => $data]);
    }
    
    /**
     * Правила для валидатора
     * @return array{size: string, speed: array<null_or_integer|string>}
     */
    private function rules() {
        return [
            "size" => "present|integer",
        "speed" => ["present",new null_or_integer]];
    }
    
    /**
     * Сообщение об ошибках для валидатора
     * @return array{size.integer: string, speed.integer: string}
     */
    private function message() {
        return [
            "size.integer" => "В поле должны быть только числа",
            "speed.integer" => "В поле должны быть только числа"
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
     * Создание нового типа монстра
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        $validate = $this->ValidateMake($request);
        
        if ($validate->passes()) {
            $bb = new Type_Monster($request->all());
            $bb->save();
            return back()->with(['message' => "Добавление прошло удачно!"]);
        }
        elseif($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
    }
    
    /**
     * Детальный вывод о типе монстра
     * @param \App\Models\Type_Monster $monster
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Type_Monster $monster) {
        return view("type_monsters.detail", ['monster' => $monster]);
    }
    
    /**
     * Страница с редактированием типа монстра
     * @param \App\Models\Type_Monster $monster
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Type_Monster $monster) {
        return view("type_monsters.edit", ['monster' => $monster]);
    }
    
    /**
     * Обновление типа монстра
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Type_Monster $monster
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Type_Monster $monster) {
        $validate = $this->ValidateMake($request);
        if ($validate->passes()) {
            $monster->update($request->all());
            return redirect()->route("type_monsters");
        }
        else {
            return back()->withErrors($validate)->withInput();
        }
    }

    /**
     * Удаление типа монстра
     * У монстров, которых был присвоен данный тип - в колонке types_id будет null 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request) {
        Type_Monster::destroy($request->check);
        return back();
    }
}