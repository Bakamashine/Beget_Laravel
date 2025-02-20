@extends('layouts.app')

@section('title', 'Написание комментария')

@section('content')
    <h2 class="text-2xl">Создание комментария</h2>
    
    <form class="mt-10" method="post" action="{{route('comments.store')}}">
        @csrf
        <div>
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="mt-1 block mobile:w-1/4 max-mobile:w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        
        <div class="mt-4">
            <label for="text">Поле для отзыва</label>
            <textarea name="text" class="mt-1 block mobile:w-1/2 max-mobile:w-full h-96 resize-none border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm id="text" required></textarea>
        </div>
        
        <fieldset class="pb-10 mt-4 max-mobile:w-full border-2 border-gray-300 rounded-md bg-white w-1/2 space-y-4 space-x-4">
            <legend class="ml-10">Ваш отзыв следует воспринимать как...</legend>
            
            <div>
                <label class="line-through">Отрицательный</label>
                <input type="radio" name="status" value="1" required>
            </div>
            <div>
                <label>Нейтральный</label>
                <input type="radio" name="status" value="2" required>
            </div>
            <div>
                <label>Положительный</label>
                <input type="radio" name="status" value="3" required>
            </div>
            
        </fieldset>
        
        <div class="mt-10">
            <button type="submit" class="mobile:w-1/2 max-mobile:w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Создать комментарий
            </button>
        </div>
    </form>
@endsection