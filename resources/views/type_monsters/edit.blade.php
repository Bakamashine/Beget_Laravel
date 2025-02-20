@extends('layouts.admin_header')

@section('title', $monster->type)

@section('content')
    <h2 class="text-2xl">Редактирование записи</h2>
    
    <div class="pt-2">
        
	<form method="post" class="space-y-4" action="{{route("type_monsters.update", ['monster' => $monster->id])}}">
		@csrf
        @method('patch')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Название типа</label>
                <input type="text" id="name" name="type" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$monster->type}}" required>
            </div>

            <div>
                <label for="speed" class="block text-sm font-medium text-gray-700">Скорость</label>
                <input type="text" id="speed" name="speed" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$monster->speed}}">
@error('speed')
    {{$message}}
@enderror
            </div>

            <div>
                <label for="element" class="block text-sm font-medium text-gray-700">Элемент (водяной, земляной)</label>
                <input type="text" id="element" name="element" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$monster->element}}">
            </div>


            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                <input type="text" id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  value="{{$monster->description}}">
            </div>

            <div>
                <label for="resist" class="block text-sm font-medium text-gray-700">Сопротивляемость</label>
                <input type="text" id="resist" name="resist" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  value="{{$monster->resist}}">
            </div>

            <div>
                <label for="size" class="block text-sm font-medium text-gray-700">Размер (в см)</label>
<div class="flex">
<button type="button" id="count_minus">-</button>
        {{-- Не получилось по другому убрать стрелки --}}
		<input type="number" name="size" id="size"  max="666" min="10"  style="-moz-appearance: textfield;" class="no-spinners  mx-3 mt-1 block w-[50px] border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-50 focus:border-indigo-500 sm:text-sm" value="{{$monster->size}}">
<button type="button" id="count_plus">+</button>
@error('size')
    {{$message}}
@enderror
</div>
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
                <input type="text" id="recommendations" name="recommendations" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  value="{{$monster->recommendations}}">
            </div>

            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Редактировать тип
            </button>
    </form>


<div class="mt-6">
    <a class="hover:text-admin_menu_btn transition-all duration-75 ease-linear" href="{{route('type_monsters')}}">Назад</a>
</div>
</section>

    </div>
    
@endsection
