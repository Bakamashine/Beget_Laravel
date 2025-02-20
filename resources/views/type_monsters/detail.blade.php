@extends('layouts.admin_header')

@section('title', $monster->type)

@section('content')
    <h2 class="text-2xl">{{$monster->type}}</h2>
    <p class="text-xs italic">Характеристики:</p>
    
    <div class="pt-2">
        <p>Скорость: {{$monster->speed}}</p>
        <p>Элемент: {{$monster->element}}</p>
        <p>Описание: {{$monster->description}}</p>
        <p>Сопротивляемость: {{$monster->resist}}</p>
        <p>Размер: {{$monster->size}}</p>
        @php
            $minions = $monster->can_summons_minions;
            $minions ? $minions = "Да" : $minions = "Нет";
        @endphp
        <p>Может ли призывать миньёнов?: {{$minions}}</p>
        <p>Рекомендации: {{$monster->recommendations}}</p>
    </div>
<div class="mt-6">
    <a class="hover:text-admin_menu_btn transition-all duration-75 ease-linear" href="{{route('type_monsters')}}">Назад</a>
</div>
@endsection
