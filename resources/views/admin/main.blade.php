@extends('layouts.admin_header')

@section('title', 'LaraPress')

@section('content')
    <h1 class="text-center text-4xl">Добро пожаловать на административную страницу LaraPress!</h1>
    
    <div class="mt-6">
        <h3 class="text-lg">Вот что доступно на данный момент: </h3>
        <ol class="list-decimal">
            <li>Управление пользователями (полный CRUD) (только администратор)</li>
            <li>Полный CRUD типов монстров</li>
            <li>Полный CRUD монстрами</li>
            <li>Добавление файлов в галерею и последущее их использование</li>
            <li>Написание ответов с разметкой пользователям</li>
            <li>Вёрстка желает оставлять лучшего</li>
        </ol>

    </div>
    
    <section class="mt-10">
        
    {{-- Ваши заявки --}}
    @if (count($data) > 0)
    <section class="">

    <h2 class="text-2xl">Ваши заявки: </h2>
    
    <div class="mt-10">
            <table class="w-full">
            <thead class="border-2">
                <tr class="text-left">
                    <th class="border-2 border-admin_black">#</th>
                    <th class="border-2 border-admin_black">Заказ</th>
                    <th class="border-2 border-admin_black">Статус</th>
                    <th class="border-2 border-admin_black">Выбрать статус</th>
                </tr>
            </thead>
		<tbody class="border-2 border-admin_black">
        @foreach($data as $key => $value)
                <tr>
                    <td class="border-2 border-admin_black">
                        {{$key}}
                    </td>
                    <td class="border-2 border-admin_black">
                        {{-- {{$value->monsters}} --}}
                            <button type="button" 
                            onclick="window.location.href='{{route('zayavki.show', ['id' => $value->id])}}'" 
                            class="hover:bg-admin_menu_btn  hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                                Посмотреть...
                            </button>
                    </td>
                    <td class="border-2 border-admin_black">
                        {{$value->status}}
                    </td>

                    <td class="border-2 border-admin_black">
                        <form method="post" action="{{route('zayavki.update')}}">
                        @csrf
                            <select id="status" name="status" class="bg-gray-50 border border-gray-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Отменено</option>
                                    <option>Выращивается</option>
                                    <option>Готово к получению</option>
                            </select>
                            
                            <div class="mt-4">
                                <button
                                value="{{$value->id}}"
                                name="id"
                                class="hover:bg-admin_menu_btn bg-gray-400 hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                                    Сменить статус
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
        @endforeach
    </div>
    </section>
    @endif
@endsection