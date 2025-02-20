@extends('layouts.admin_header')

@section('title', 'Монстры')

@section('content')
    <h2 class="text-2xl">Добавление нового монстра</h2>
	<form method="post" class="space-y-4" action="{{route("monsters.store")}}">
		@csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя монстра</label>
                <input type="text" id="name" name="name" class="mt-1 block mobile:w-full max-mobile:w-4/5 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('name')
                    {{$message}}
                @enderror
            </div>

            <div>
                    @if (count($data) > 0)
                <label for="types" class="block text-sm font-medium text-gray-700">Выберите тип монстра</label>
                <select id="types" name="types_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mobile:w-full max-mobile:w-4/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($data as $value)
                            <option value="{{$value->id}}">{{$value->type}}</option>
                        @endforeach
                </select>
                @else
                <p>Нет типов!</p>
                    @endif
            </div>

            <div>
                <label for="types" class="block text-sm font-medium text-gray-700">Выберите изображение</label>
                <input type="hidden" value=""  id="hidden-input" name="images_id">
                <button type="button" id="openWindow" class="text-white bg-admin_menu_btn w-80 h-[41px] text-sm hover:bg-admin_hover_btn">Открыть галерею</button>
            
                @error('images_id')
                    {{$message}}
                @enderror
            </div>


            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Цена (в рублях)</label>
                <input type="text" id="price" name="price" class="mt-1 block mobile:w-full max-mobile:w-4/5 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                @error('price')
                    {{$message}}
                @enderror
            </div>

            <button type="submit" class="mobile:w-full max-mobile:w-4/5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Создать монстра
            </button>
    </form>

@include("layouts.modalWindow")
<script src="/js/modal_window.js"></script>

<div class="mt-10 space-y-4">
    <h2 class="text-2xl">Вывод всех типов монстров</h2>

        @if (count($monsters) > 0)
        <form method="post" action="{{route("monsters.delete")}}">
        @csrf
        @method('delete')
            <table class="w-full">
            <thead class="border-2">
                <tr class="text-left">
                    <th class="border-2 border-admin_black">#</th>
                    <th class="border-2 border-admin_black">Тип</th>
                    <th class="border-2 border-admin_black">#</th>
                    <th class="border-2 border-admin_black">#</th>
                </tr>
            </thead>
		<tbody class="border-2 border-admin_black">
            @foreach($monsters as $monster)
                <tr>
                    <td class="border-2 border-admin_black">
                        <input class="block m-auto" type="checkbox" name="check[]" value="{{$monster->id}}">
                    </td>
                    <td class="border-2 border-admin_black"><label>{{$monster->name}}</label></td>
                    <td class="border-2 border-admin_black">
                            <button type="button" onclick="window.location.href='{{route('monsters.show', ['monster' => $monster->id])}}'" class="hover:bg-admin_menu_btn  hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                                Подробнее...
                            </button>
                    </td>
                    <td class="border-2 border-admin_black">
                            <button type="button" onclick="window.location.href='{{route('monsters.edit', ['monster' => $monster->id])}}'"  class="hover:bg-admin_menu_btn hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                            Редактировать
                            </button>
                    </td>
                </tr>

            @endforeach
                    <td class="border-2 border-admin_black">
                            <button type="submit"  class="hover:bg-red-600 hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
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
