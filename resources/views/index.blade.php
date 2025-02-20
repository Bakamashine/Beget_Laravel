@extends('layouts/app')

@section('title', 'Главная')

@section('content')
    <h1 class="text-center text-4xl">Добро пожаловать на MonstroPolice!</h1>
    <p class="text-sm text-center italic">Взгляни в лицо своему ужасу и построй с ним будущее</p>

{{-- Вывод последних трёх записей в качестве карусели --}}
  <div class="flex justify-center items-center pt-4">
    <div>
      <section id="slider" class="border-2 max-w-96 overflow-hidden max-mobile:w-4/5">
        <div id="sliderline" class="flex transition-all duration-[300ms] ease-linear  size-96">
          @foreach($data as $value)
            <img data_carousel class="size-max" src="{{$value->gallery->path}}">
          @endforeach
        </div>
      </section>

      <div class="max-mobile:w-4/5">
        <button id="back" class="float-start">Назад</button>
        <button id="next" class="float-end">Вперёд</button>
      </div>
    </div>
  </div>
  
  <div class="mt-10">
    <p class="text-center">Работает плохо, не правда ли?</p>
  </div>
  <script src="/js/slider.js"></script>
@endsection