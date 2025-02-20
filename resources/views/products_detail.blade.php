@extends('layouts/app')

@section('title', $data->name)

@section('content')
    <h2 class="text-2xl">Подробная информация</h2>
    
    <div class="mobile:flex mobile:justify-center mt-10">
        <div class="min-w-40">
            <img class="rounded-sm max-mobile:mx-auto" width="500px" height="500px" src="{{$data->gallery->path}}">
        </div>
    
        <div class="mobile:ml-36 max-mobile:mt-10 text-center">
            
            <h2 class="text-2xl">{{$data->name}}</h2>
            <h3 class="text-1xl">Тип: {{$data->type_monsters->type}}</h3>
            <p class="text-xs italic">Характеристики:</p>
            
            <div class="pt-2">
                <p>Скорость: {{$data->type_monsters->speed}}</p>
                <p>Элемент: {{$data->type_monsters->element}}</p>
                <p>Описание: {{$data->type_monsters->description}}</p>
                <p>Сопротивляемость: {{$data->type_monsters->resist}}</p>
                <p>Размер: {{$data->type_monsters->size}}</p>
                @php
                    $minions = $data->type_monsters->can_summons_minions;
                    $minions ? $minions = "Да" : $minions = "Нет";
                @endphp
                <p>Может ли призывать миньёнов?: {{$minions}}</p>
                <p>Рекомендации: <span class="italic">{{$data->type_monsters->recommendations}}</span></p>
                
            {{-- <form method="post" action="{{route('products.addCart', ['id' => $data->id])}}" class="mt-6"> --}}
            <form method="post" action="{{route('products.addCart')}}" class="mt-6">
                @csrf
                <button name="id" value="{{$data->id}}" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Добавить в желаемое
                </button>
                
                @if ($errors->ErrorAddCart->get('id'))
                    {{$errors->ErrorAddCart->get('id')[0]}}
                @endif
            </form>

            </div>

        </div>

    </div>
@endsection