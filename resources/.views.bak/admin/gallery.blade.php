@extends('layouts.admin_header')

@section('title', 'Галерея')
@section('content')
    <h2 class="text-2xl">Медиафайлы</h2>
    <p class="text-xs italic">Управляйте всеми медиа-материалами на вашем сайте, в том числе изображениями, видео и не только.</p>
    
    <div class="mt-6 bg-white h-[40px] border-[1px] w-full flex">

            <div class="h-full w-32 mr-4">
                <form method="get" action="{{route("gallery")}}" class="my-auto h-full flex justify-center items-center">
                    <input type="hidden" value="image" name="name">
                    <button type="submit" class="hover:border-b-2 border-admin_menu_btn">Картинки</button>
                </form>
            </div>

            <div class="h-full w-32 mr-4">
                <form method="get" action="{{route("gallery")}}" class="my-auto h-full flex justify-center items-center">
                    <input type="hidden" value="video" name="name">
                    <button type="submit" class="hover:border-b-2 border-admin_menu_btn">Видео</button>
                </form>
            </div>

            <div class="h-full w-32 mr-4">
                <form method="get" action="{{route("gallery")}}" class="my-auto h-full flex justify-center items-center">
                    <input type="hidden" value="application" name="name">
                    <button type="submit" class="hover:border-b-2 border-admin_menu_btn">Файлы</button>
                </form>
            </div>


            <div class="h-full w-40 mr-4">
                <form method="get" action="{{route("gallery")}}" class="my-auto h-full flex justify-center items-center">
                    <input type="hidden" value="text" name="name">
                    <button type="submit" class="hover:border-b-2 border-admin_menu_btn">Текстовые файлы</button>
                </form>
            </div>
    </div>

    {{-- Добавление файлов --}}
    <div class="mt-4 bg-white  border-[1px] w-full">
        <form method="post" enctype="multipart/form-data" action="{{route("gallery.store")}}">
            @csrf
                        <label class="flex flex-col items-center px-4 py-2 bg-white text-blue shadow-lg tracking-wide uppercase border border-blue cursor-pointer ">
                            <i class="fas fa-cloud-upload-alt fa-lg"></i>
                            {{-- <span class="mt-1 text-sm leading-normal">Загрузить изображения</span> --}}
                            {{-- FIXME: При загрузке видео ложит сервер --}}
                            <input type="file" id="photo" name="files[]"  class="" multiple>
                        <div class="mt-2">
                            <button type="submit" value="OK" class="hover:bg-blue-500 hover:text-white w-[240px] h-[36px] rounded-xl transition-all duration-200 ease-in">
                            Загрузить файлы
                            </button>
                        </div>
                        </label>
        </form>
        
    </div>

    {{-- 
    11.02.25
    Генерирование картинок (частично работает, а точнее - так и не смог найти бесплатную нейросеть. 
    Большая часть в бане из-за санкций)
    Какие работали, потом требовали деньги за токены.
    Сам запрос писался на Python (для этого даже установил библиотеку LaravelPython), так как на Laravel не 
    получилось написать нормальное отправление в JSON и принятие в form-data
    из-за чего постоянно возникала ошибка 400 (bad request)
    --}}
    {{-- <div class="mt-4 bg-white  border-[1px] w-full">
        <form method="get" enctype="multipart/form-data" action="{{route("gallery.generate")}}"">
            @csrf
            <input name='text' class='border-2 border-black'>
            <button type="submit">Сгенерировать изображение</button>
        </form>
    </div> --}}
    
    @if ($mes == "image")
    <div class="mt-10">
        <h3 class="text-center">Ваши изображения: </h3>
        <div class="mt-4">
        @if (count($files) > 0) 
            <div class="flex flex-wrap justify-center">
                @foreach($files as $file)
                    <div class="mr-3 ">
                        <img key="{{$file->id}}" src="{{$file->path}}" class="w-[500px] h-[400px] m-3 rounded-md">
                        <p class="text-center italic">{{$file->name}}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">Изображений нет, загрузите</p>
        @endif    
        </div>
    </div>

{{-- FIXME: С видео проблемы, он не считывает их как файл. Да и после загрузки видео 10мб+ происходит краш --}}
    @elseif ($mes == "video")
    <div class="mt-10">
        <h3 class="text-center">Ваши видео: </h3>
        <div class="mt-4">
        @if (count($files) > 0) 
            <div class="flex flex-wrap justify-center">
                @foreach($files as $file)
                    {{-- <img key="{{$file->id}}" src="{{$file->path}}" class="w-[500px] h-[400px] m-3 rounded-md"> --}}
                @endforeach
            </div>
        @else
            <p class="text-center">Видео нет, загрузите</p>
        @endif    
        </div>
    </div>
    
    @else
    <div class="mt-10">
        <h3 class="text-center">Ваши файлы: </h3>
        <div class="mt-4">
        @if (count($files) > 0) 
            <ol class="list-decimal">
                @foreach($files as $file)
                    {{-- <p class="block">{{$file->name}}</p> --}}
                    <li>{{$file->name}}</li>
                @endforeach
            </ol>
        @else
            <p class="text-center">Файлов нет, загрузите</p>
        @endif    
        </div>
    </div>
    @endif
@endsection