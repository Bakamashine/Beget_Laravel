@extends('layouts.admin_header')

@section('title', 'Управление пользователями')

@section('content')

    <h2 class="text-2xl">Управление пользователями</h2>
    <p class="italic class  max-mobile:w-4/5">На этой странице вы можете добавлять, удалять и всячески редактировать пользователей</p>


	<form method="post" class="space-y-4" action="{{route("user_management.store")}}">
		@csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
                <input type="text" id="name" name="name" class="mt-1 block mobile:w-full max-mobile:w-4/5 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('name')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="surname" class="block text-sm font-medium text-gray-700">Фамилия</label>
                <input type="text" name="surname" class="mt-1 block mobile:w-full max-mobile:w-4/5 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('surname')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="patronym" class="block text-sm font-medium text-gray-700">Отчество</label>
                <input type="text" name="patronymic" class="mt-1 block mobile:w-full max-mobile:w-4/5 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('patronymic')
                    {{$message}}
                @enderror
            </div>


            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Почта</label>
                <input type="email"  name="email" class="mt-1 block mobile:w-full max-mobile:w-4/5 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('email')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="text" id="password" name="password" class="mmobile:w-full max-mobile:w-4/5 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('password')
                    {{$message}}
                @enderror
            </div>

            <div>
                    @if (count($data) > 0)
                <label for="types" class="block text-sm font-medium text-gray-700">Выберите роль пользователя</label>
                <select id="types" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mobile:w-full max-mobile:w-4/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @foreach($data as $value)
                            <option value="{{$value->id}}">{{$value->role}}</option>
                        @endforeach
                </select>
                @else
                <p>Нет ролей!</p>
                    @endif
            </div>


            <button type="submit" class="mobile:w-full max-mobile:w-4/5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Создать пользователя
            </button>
    </form>
    
<div class="mt-10 space-y-4">
    <h2 class="text-2xl">Вывод всех пользователей</h2>
    <p><span class="border-b-[1px] border-red-700 text-red-700">Внимание!</span> Удаляйте с осторожностью, вы можете и себя удалить случаем</p>

        @if (count($users) > 0)
        <form method="post" action="{{route("user_management.delete")}}">
        @csrf
        @method('delete')
            <table class="w-full">
            <thead class="border-2">
                <tr class="text-left">
                    <th class="border-2 border-admin_black">#</th>
                    <th class="border-2 border-admin_black">Имя</th>
                    <th class="border-2 border-admin_black">#</th>
                    <th class="border-2 border-admin_black">#</th>
                </tr>
            </thead>
		<tbody class="border-2 border-admin_black">
            @foreach($users as $user)
                <tr>
                    <td class="border-2 border-admin_black">
                        <input class="block m-auto" type="checkbox" name="check[]" value="{{$user->id}}">
                    </td>
                    <td class="border-2 border-admin_black"><label>{{$user->name}}</label></td>
                    <td class="border-2 border-admin_black">
                            <button type="button" onclick="window.location.href='{{route('user_management.show', ['user' => $user->id])}}'" class="hover:bg-admin_menu_btn  hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                                Подробнее...
                            </button>
                    </td>
                    <td class="border-2 border-admin_black">
                            <button type="button" onclick="window.location.href='{{route('user_management.edit', ['user' => $user->id])}}'"  class="hover:bg-admin_menu_btn hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                            Редактировать
                            </button>
                    </td>
                </tr>
            @endforeach
                    <td class="border-2 border-admin_black">
                            <button type="submit" onclick="window.location.href='{{route('user_management.delete', ['user' => $user->id])}}'"  class="hover:bg-red-600 hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                            Удалить
                            </button>
                    </td>
	    </tbody>
	    </table>
</form>

        @else
        <p>Записей нет</p>
        @endif        
    </div>
</div>
@endsection