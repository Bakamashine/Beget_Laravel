@extends('layouts.app')

@section('title', 'Добавление аватара')

@section('content')
    <h2 class="text-2xl ">Смена аватарки</h2>
    
    <form method="post" class="mt-10" enctype="multipart/form-data" action="{{route('home.loadAvatar')}}">
        @csrf
        @method('put')
        <label>Выберите фотографию для загрузки</label>
        <input class="block" type="file"  name="file" required>
        @if ($errors->ErrorImage->get('file'))
            {{$errors->ErrorImage->get('file')[0]}}
        @endif
        <div class="mt-6">
            <button class="text-admin_menu_btn duration-150 hover:text-admin_hover_btn">Загрузить фотографию</button>
        </div>
    </form>
    
    
<div class="mt-6">
    <a class="hover:text-admin_menu_btn transition-all duration-75 ease-linear" href="{{route('home')}}">Назад</a>
</div>
@endsection