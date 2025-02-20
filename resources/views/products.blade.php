@extends('layouts/app')

@section('title', 'Монстры')

@section('content')

{{-- @dd($search) --}}
<h1 class="text-center text-4xl">Все монстры</h1>


<div class="mobile:flex mobile:flex-row-reverse max-mobile:grid">

    {{-- Поиск --}}
<div> 
    <form method="get" action="{{route("products")}}" class="mt-10 bg-white border-2 border-wp-border space-y-4  p-6">
        {{-- Выбор имени --}}
        <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя монстра</label>
                <input type="text" value="{{$search->get('name')}}" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div> 
        {{-- Выбор цены --}}
        <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Его цена</label>
                <div class="flex">
                    <input placeholder="Минимум" value="{{$search->get('price_min')}}" type="text" id="price" name="price_min" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                    <input placeholder="Максимум" value="{{$search->get('price_max')}}" type="text" id="price" name="price_max" class="ml-4 mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                    
                    
                </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-red-700 text-sm">{{$error}}</p>
                        @endforeach
                    @endif

        </div>

        {{-- Выбор типов --}}
            <div>

                    @if (count($types) > 0)
                <label for="types" class="block text-sm font-medium text-gray-700">Выберите тип монстра</label>
                <select id="types" name="types_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($types as $value)
                            <option @selected($value->id == $search->get('types_id')) value="{{$value->id}}">{{$value->type}}</option>
                        @endforeach
                </select>
                @else
                <p>Нет типов!</p>
                    @endif

            </div>
            
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Поиск
            </button>

            <button type="button" onclick="window.location.href='{{route('products')}}'" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Сбросить
            </button>
    </form>
    

</div>
<div class="flex flex-wrap max-mobile:justify-center mobile:w-3/5 max-mobile:w-full">

@if (count($data) > 0)
@foreach($data as $value)
<div class="mr-10 mt-10 mobile:w-96 max-mobile:w-11/12 max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="{{$value->gallery->path}}" alt="" />
    <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$value->name}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$value->price}} рублей</p>
        <a href="{{route('products.show', ['monster' => $value->id])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Подробнее
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
@endforeach
@else
<p class="text-center">Монстров пока что нет, спите спокойно</p>
@endif
</div>
</div>


<div class="flex justify-center items-center mt-10">
    {{$data->links()}}
</div>


@endsection