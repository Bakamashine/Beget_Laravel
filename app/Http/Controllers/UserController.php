<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller {
    
    /**
     * Показ основной страницы об управлении пользователями
     * @return \Illuminate\Contracts\View\View
     */
    public function up() {
        return view("user_management.index", [
            'data' => Role::all(),
            "users" => User::all()
        ]);
    }
    
    /**
     * Правила для валидации
     * @return array{email: array<string|\Illuminate\Validation\Rules\Unique>, name: string[], password: string[], patronymic: string[], surname: string[]}
     */
    protected function rules() {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', "string", "max:255"],
            "patronymic" => ["string", "max:255"],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', "string", "max:255", "min:8"]
        ];
    }
    
    /**
     * Сообщения для валидации
     * @return array{email.email: string, email.required: string, name.max: string, name.required: string, name.string: string, password.max: string, password.min: string, password.required: string, password.string: string, patronymic.max: string, patronymic.string: string, surname.max: string, surname.required: string, surname.string: string}
     */
    protected function message() {
        return [
            "name.required" => "Поле :attribute обязательно",
            "name.string" => "Поле :attribute должно быть строкой",
            "name.max" => "Поле :attribute не должно привышать 255 символов",

            "surname.required" => "Поле :attribute обязательно",
            "surname.string" => "Поле :attribute должно быть строкой",
            "surname.max" => "Поле :attribute не должно привышать 255 символов",
            
            "patronymic.string" => "Поле :attribute должно быть строкой",
            "patronymic.max" => "Поле :attribute не должно привышать 255 символов",
            
            "email.required" => "Поле :attribute обязательно",
            "email.email" => "Поле :attribute должно походить на почту",

            
            "password.required" => "Поле :attribute обязательно",
            "password.string" => "Поле :attribute должно быть строкой",
            "password.max" => "Поле :attribute не должно привышать 255 символов",
            "password.min" => "Поле :attribute не должно быть короче 8 символов"
        ];
    }
    
    /**
     * Псевдонимы для полей (для валидатора)
     * @return array{email: string, name: string, password: string, patronymic: string, surname: string}
     */
    protected function subs() {
        return [
            "name" => "Имя",
            "surname" => "Фамилия",
            "patronymic" => "Отчество",
            "email" => "Почта",
            "password" => "Пароль"
        ];
    }
    
    /**
     * Явное создание валидатора
     * @param mixed $input
     * @param mixed $rules
     * @param mixed $message
     * @param mixed $subs
     * @return \Illuminate\Validation\Validator
     */
    protected function Validate($input, $rules, $message, $subs) {
        return Validator::make($input, 
            $rules,
            $message,
            $subs
    );
    }
    
    /**
     * Создание нового пользователя
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request) {
        
        $validate = $this->Validate($request->all(), $this->rules(), $this->message(), $this->subs());

        if ($validate->passes()) {
            $user = new User($request->all());
            $user->save();
            return back();
        }
        
        else {
            return back()->withErrors($validate)->withInput();
        }

    }
    
    /**
     * Вывод пользователей по ролям
     * @return \Illuminate\Database\Eloquent\Builder<User>
     */
    protected function roles_and_users() {
        return User::with("role");
    }
    
    /**
     * Детальный показ пользователя
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Request $request) {
        $data = $this->roles_and_users()->find($request->user);
        return view("user_management.detail", ['user' => $data]);
    }
    
    
    /**
     * Удаление пользователя
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request) {
        User::destroy($request->check);
        return back();
    }
    
    /**
     * Страница с редактированием пользователя
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Request $request) {
        $data = $this->roles_and_users()->find($request->user);
        return view("user_management.edit", [
            'user' => $data,
            'data' => Role::all()
        ]);
    }
    
    
    /**
     * Обновление пользователя
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        $user = User::find($request->user);
        
        $validate = $this->Validate(
            $request->all(),
            [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', "string", "max:255"],
            "patronymic" => ["string", "max:255"],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' => ['max:255', function ($name, $value, $fail) {
                if ($value == "" || !isset($value)) {
                    return;
                }
                if (strlen($value) < 8) {
                    $fail("Поле :attribute не должно быть короче 8 символов");
                        return;
                }
            }]
        ],
        $this->message(),
        $this->subs()
    );

        
    if ($validate->passes()) {
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->email = $request->email;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('user_management');
    }
        else {
            return back()->withErrors($validate)->withInput();
        }
}
    
}
