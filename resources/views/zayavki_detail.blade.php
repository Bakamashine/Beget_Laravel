@extends('layouts/app')

@section('title', 'Просмотр заявки')

@section('content')
<div class="flex flex-wrap justify-center">
@foreach($data as $value)
<div class="mr-10 mt-10 max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="{{$value->gallery->path}}" alt="" />
    <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$value->name}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$value->price}} рублей</p>
        <a href="{{route('products.show', ['monster' => $value->id])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Подробнее
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
@endforeach
</div>

<div class="mt-6">
    <a href="{{route('home')}}" class="hover:text-admin_menu_btn transition-all duration-75 ease-linear">Назад</a>
@if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
    <a class="hover:text-admin_menu_btn block transition-all duration-75 ease-linear" href="{{route('admin')}}">На административную страницу</a>
</div>
@endif
@endsection