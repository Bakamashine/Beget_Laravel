@extends('layouts.admin_header')

@section('title', $user->name)

@section('content')

    <h2 class="text-2xl">Редактирование пользователя</h2>

	<form method="post" class="space-y-4" action="{{route("user_management.update", ['user' => $user->id])}}">
		@csrf
        @method('patch')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
                <input type="text" value="{{$user->name}}" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('name')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="surname" class="block text-sm font-medium text-gray-700">Фамилия</label>
                <input type="text" value="{{$user->surname}}" name="surname" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('surname')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="patronym" class="block text-sm font-medium text-gray-700">Отчество</label>
                <input type="text" value="{{$user->patronymic}}" name="patronymic" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('patronymic')
                    {{$message}}
                @enderror
            </div>


            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Почта</label>
                <input type="email" value="{{$user->email}}"  name="email" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('email')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль, если не хотите его менять, то оставьте поле пустым</label>
                <input type="text"  id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                @error('password')
                    {{$message}}
                @enderror
            </div>

            <div>
                    @if (count($data) > 0)
                <label for="types" class="block text-sm font-medium text-gray-700">Выберите роль пользователя</label>
                <select id="types" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @foreach($data as $value)
                            @if ($user->role_id == $value->id) 
                                <option value="{{$value->id}}" selected>{{$value->role}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->role}}</option>
                            @endif
                        @endforeach
                </select>
                @else
                <p>Нет ролей!</p>
                    @endif
            </div>


            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Создать пользователя
            </button>
    </form>
@endsection