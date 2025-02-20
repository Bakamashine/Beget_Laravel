@extends('layouts.admin_header')

@section('title', 'Ответ на отзыв')

@section('content')
    
    @php
        $value = $data[0];
    @endphp
    
    <h2 class="text-2xl">Написание ответа</h2>
    <div class="mt-20 mobile:w-1/2 max-mobile:w-full p-12 border-[1px] border-wp_border mobile:flex">
            <div class="min-w-24 ">
                <img src="{{$value->images}}" alt="" class="w-24 max-mobile:mx-auto">
            </div>
            
            <div class="ml-6">
                <h3 class="inline font-semibold text-xl">{{$value->title}}</h3>
                <p class="inline text-admin_text_btn2 italic">{{$value->created_at}}</p>
                <p>{{$value->comment}}</p>                
            
                    <form method="post" class="mt-10" action="{{route('answer.store', ['id' => $value["id"]])}}">
                    @csrf
                        <button class="block hover:text-admin_menu_btn transition-all duration-75 ease-linear" type="button" id="add_tag1">Сделать текст красным</button>
                        <button class="block hover:text-admin_menu_btn transition-all duration-75 ease-linear" type="button" id="add_tag2">Сделать текст зелёным</button>
                        <button class="block hover:text-admin_menu_btn transition-all duration-75 ease-linear" type="button" id="add_tag3">Перенести строку</button>
                        <button class="block hover:text-admin_menu_btn transition-all duration-75 ease-linear" type="button" id="openWindow">Добавить картинку</button>
                        <textarea id="text" name="text" placeholder="Поле для отзыва"  class="mt-1 block w-full h-96 resize-none border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                    
                        <div class="mt-6">
                            <button class="block hover:text-admin_menu_btn transition-all duration-75 ease-linear" type="button" id="ok">Проверить</button>
                        </div>

                        <div class="mt-6">
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Отправить
            </button>
                        </div>
                        
                    </form>
                    
                    <div class="mt-6" id="newhtml"></div>
            </div>
    </div>

    @include ("layouts.modalWindowPath")
    <script src="/js/feedback.js"></script>

@endsection