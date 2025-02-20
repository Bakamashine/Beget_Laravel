@extends('layouts.admin_header')

@section('content')
    <h1 class="text-center text-4xl">Добро пожаловать на административную страницу LaraPress!</h1>
    
    <div class="mt-6">
        <h3 class="text-lg">Вот что доступно на данный момент: </h3>
        <ol class="list-decimal">
            <li>Управление пользователями (полный CRUD) (только администратор)</li>
            <li>Полный CRUD типов монстров</li>
            <li>Полный CRUD монстрами</li>
            <li>Добавление файлов в галерею и последущее их использование</li>
            <li>Написание ответов с разметкой пользователям</li>
        </ol>

    </div>
@endsection