@extends('layouts.admin_header')

@section('title', $user->name)

@section('content')

            <div class="flex">
            <div>
                        <h2 class="text-2xl">{{$user->name}}</h2>
                        <h3 class="text-1xl">Права: {{$user->role->role}}</h3>
                        <p class="text-xs italic">Данные:</p>
                <div class="pt-2">
                <p>Фамилия: {{$user->surname}}</p>
                <p>Отчество: {{$user->patronymic}}</p>
                <p>Почта: {{$user->email}}</p>
                <p>Создан: {{$user->created_at}}</p>
                </div>
            </div>
                
                <div class="ml-auto">
                    <p>Его фото: </p>
                    <img class="rounded-md w-[1000px] h-[500px]" src="{{$user->avatar}}" alt="Отсуствует">
                </div>
            </div>
@endsection