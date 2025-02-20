@extends('layouts.admin_header')

@section('title', 'Типы монстров')

@section('content')
    
    
    <h2 class="text-2xl">Добавление нового типа монстра</h2>
	<form method="post" class="space-y-4" action="{{route("type_monsters.store")}}">
		@csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Название типа</label>
                <input type="text" id="name" name="type" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <div>
                <label for="speed" class="block text-sm font-medium text-gray-700">Скорость</label>
                <input type="text" id="speed" name="speed" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('speed')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="element" class="block text-sm font-medium text-gray-700">Элемент (водяной, земляной)</label>
                <input type="text" id="element" name="element" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            </div>


            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                <input type="text" id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            </div>

            <div>
                <label for="resist" class="block text-sm font-medium text-gray-700">Сопротивляемость</label>
                <input type="text" id="resist" name="resist" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            </div>

            <div>
                <label for="size" class="block text-sm font-medium text-gray-700">Размер (в см)</label>
<div class="flex">
<button type="button" id="count_minus">-</button>
        {{-- Не получилось по другому убрать стрелки --}}
		<input type="number" name="size" id="size"  max="666" min="10" value="10"  style="-moz-appearance: textfield;" class="no-spinners  mx-3 mt-1 block w-[50px] border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-50 focus:border-indigo-500 sm:text-sm">
<button type="button" id="count_plus">+</button>
</div>
@error('size')
    {{$message}}
@enderror
            </div>

<div>
		    <div>
			<legend class="text-sm font-medium text-gray-700">Умеет ли призывать миньёнов?</legend>
			<div class="flex">
			<div>
			    <input type="radio" name="can_summons_minions" id="minions_yes" value="1" checked>
			    <label for="minions_yes" class="text-sm font-medium text-gray-700"> Да</label>
			</div>

			<div class="ml-3">
			    <input type="radio" name="can_summons_minions" id="minions_no" value="0">
			    <label for="minions_no" class="text-sm font-medium text-gray-700"> Нет</label>
			</div>
		</div>
		    </div>
</div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Рекомендации</label>
                <input type="text" id="recommendations" name="recommendations" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            </div>

            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Добавить тип
            </button>
    </form>

<div class="mt-10 space-y-4">
    <h2 class="text-2xl">Вывод всех типов монстров</h2>

        @if (count($types) > 0)
        <form method="post" action="{{route("type_monsters.delete")}}">
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
            @foreach($types as $type)
                <tr>
                    <td class="border-2 border-admin_black">
                        <input class="block m-auto" type="checkbox" name="check[]" value="{{$type->id}}">
                    </td>
                    <td class="border-2 border-admin_black"><label>{{$type->type}}</label></td>
                    <td class="border-2 border-admin_black">
                            <button type="button" onclick="window.location.href='{{route('type_monsters.show', ['monster' => $type->id])}}'" class="hover:bg-admin_menu_btn  hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                                Подробнее...
                            </button>
                    </td>
                    <td class="border-2 border-admin_black">
                            <button type="button" onclick="window.location.href='{{route('type_monsters.edit', ['monster' => $type->id])}}'"  class="hover:bg-admin_menu_btn hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
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

    <script src="/js/count.js"></script>
@endsection
