@extends('../layouts/app')

@section('title', 'Регистрация')

  
@section('content')
  
  
    <h2 class="text-2xl">Регистрация</h2>
	<form method="post" class="space-y-4" action="{{route("register.store")}}">
		@csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('name')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="surname" class="block text-sm font-medium text-gray-700">Фамилия</label>
                <input type="text" name="surname" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('surname')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="patronym" class="block text-sm font-medium text-gray-700">Отчество</label>
                <input type="text" name="patronymic" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('patronymic')
                    {{$message}}
                @enderror
            </div>


            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Почта</label>
                <input type="email"  name="email" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('email')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('password')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Повторите пароль</label>
                <input type="password" id="password" name="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('password')
                    {{$message}}
                @enderror
            </div>

            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Зарегистрироваться
            </button>
    </form>
@endsection
