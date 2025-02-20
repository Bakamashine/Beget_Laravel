@extends('layouts.admin_header')

@section('title', $data->name)

@section('content')

@php

    try {
        $type_monsters = $data->type_monsters;
        $path = $data->gallery->path;
    
@endphp

    <div class="flex">
        <div>
            <h2 class="text-2xl">{{$data->name}}</h2>
            <h3 class="text-1xl">Тип: {{$type_monsters->type}}</h3>
            <p class="text-xs italic">Характеристики:</p>
            
            <div class="pt-2">
                <p>Скорость: {{$type_monsters->speed}}</p>
                <p>Элемент: {{$type_monsters->element}}</p>
                <p>Описание: {{$type_monsters->description}}</p>
                <p>Сопротивляемость: {{$type_monsters->resist}}</p>
                <p>Размер: {{$type_monsters->size}}</p>
                @php
                    $minions = $type_monsters->can_summons_minions;
                    $minions ? $minions = "Да" : $minions = "Нет";
                @endphp
                <p>Может ли призывать миньёнов?: {{$minions}}</p>
                <p>Рекомендации: <span class="italic">{{$type_monsters->recommendations}}</span></p>
            </div>
        </div>
    
        <div class="ml-auto">
            <p>Его фото: </p>
            <img class="rounded-md w-[1000px] h-[500px]" src="{{$path}}" alt="Отсуствует">
        </div>
    </div>
<div class="mt-6">
    <a class="hover:text-admin_menu_btn transition-all duration-75 ease-linear" href="{{route('monsters')}}">Назад</a>
</div>
   @php
} catch(\ErrorException $e) {
   @endphp

    <h2 class="text-2xl">Исключение</h2>
   <p>В записи отсуствует тип или фото, добавьте его или их во вкладке <a href="{{route('monsters.edit', ['monster' => $data->id])}}">Редактировать</a></p>
   
   @php
}
@endphp
@endsection