@extends('layouts.admin_header')

@section('title', 'Монстры')

@section('content')
    <h2 class="text-2xl">Редактирование монстра</h2>
	<form method="post" class="space-y-4" action="{{route("monsters.update", ['monster' => $data->id])}}">
		@csrf
        @method('patch')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя монстра</label>
                <input type="text" value="{{$data->name}}" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('name')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="types" class="block text-sm font-medium text-gray-700">Выберите тип монстра</label>
                @if (count($type) > 0)
                <select id="types" name="types_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($type as $value)
                            @if ($value->id == $data->types_id)
                            <option value="{{$value->id}}" selected>{{$value->type}}</option>
                            @else
                            <option value="{{$value->id}}">{{$value->type}}</option>
                            @endif
                        @endforeach
                </select>
                @else
                <p>Нет типов!</p>
                @endif
            </div>

            <div>
                <label for="types" class="block text-sm font-medium text-gray-700">Выберите изображение</label>
                <input type="hidden" value="{{$data->images_id}}"  id="hidden-input" name="images_id">
                <button type="button" id="openWindow" class="text-white bg-admin_menu_btn w-80 h-[41px] text-sm hover:bg-admin_hover_btn">Открыть галерею</button>
            
                @error('images_id')
                    {{$message}}
                @enderror
            </div>


            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Цена (в рублях)</label>
                <input type="text" id="price" value="{{$data->price}}" name="price" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                @error('price')
                    {{$message}}
                @enderror
            </div>

            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Редактировать монстра
            </button>
    </form>

@include("layouts.modalWindow")
<script src="/js/modal_window.js"></script>
@endsection
