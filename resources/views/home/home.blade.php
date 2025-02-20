@extends('layouts.app')

@section('title', 'Домашняя страница')

@section('content')
    
    @php
        $user = Auth::user();
    @endphp
    <h1 class="text-center text-4xl max-mobile:w-4/5">Добро пожаловать {{Auth::user()->name}}!</h1>
    
    <div class="mobile:flex mobile:justify-center mobile:items-center">

    <div class="mobile:w-1/2 max-mobile:w-4/5 p-6">
        @if (!isset($user->avatar))
            <p>У вас нет аватара. Не хотите ли  <a href="{{route('home.avatar')}}" class="text-admin_menu_btn duration-150 hover:text-admin_hover_btn">установить</a>?</p>
        @else 
            <p class="block">Ваш аватар: </p>
            <img src="{{$user->avatar}}" class="size-96 rounded-sm border-2 border-black">
            <p class="italic">Это ВЫ на фото?</p>
        <a href="{{route('home.avatar')}}" class="text-admin_menu_btn duration-150 hover:text-admin_hover_btn">Сменить аватар</a>
        @endif
        
        <div class="mt-10">
            <p>Вас зовут: {{Auth::user()->name . " " . Auth::user()->surname . " " . Auth::user()->patronymic}}</p>
            <p>Ваша почта: {{Auth::user()->email}}</p>
        {{-- <a href="#" class="text-admin_menu_btn duration-150 hover:text-admin_hover_btn">Сменить пароль</a> --}}
        
        </div>
    </div>
        
        <form class="mobile:ml-32 mobile:w-1/2 max-mobile:w-4/5 mt-10 space-y-4" method="post" action="{{route('user-password.update')}}">
    <h2 class="text-2xl">Смена пароля</h2>
            @csrf
            @method('put')
            <div>
                <label for="">Старый пароль</label>
                <input type="text" id="title" name="current_password" class="mt-1 block mobile:w-1/2 max-mobile:w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @if ($errors->updatePassword->get("current_password"))
                    <p class="text-red-600">{{$errors->updatePassword->get('current_password')[0]}}</p>
                @endif
            </div>
            
            <div>
                <label for="">Новый пароль</label>
                <input type="text" name="password" class="mt-1 block mobile:w-1/2 max-mobile:w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @if ($errors->updatePassword->get("password"))
                    <p class="text-red-600">{{$errors->updatePassword->get('password')[0]}}</p>
                @endif
            </div>
            
            
            <div>
                <label for="">Повторите старый пароль</label>
                <input type="text" name="password_confirmation" class="mt-1 block mobile:w-1/2 max-mobile:w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
        
            <div class="">
                <button class="text-admin_menu_btn duration-150 hover:text-admin_hover_btn">Сменить пароль</button>
            </div>

        </form>

        </div>
        <div class="mobile:flex mt-10">
    
        {{-- Ваши отзывы --}}
    @if (count($data) > 0)
    <section class="">

    <h2 class="text-2xl">Ваши отзывы: </h2>
        
    @foreach($data as $value)
    <div class="mt-10 p-12 border-[1px] border-wp_border mobile:flex">
            <div class="min-w-24">
                <img src="{{$value->images}}" alt="" class="w-24 max-mobile:mx-auto">
            </div>
            
            <div class="ml-6">
                <h3 class="inline font-semibold text-xl">{{$value->title}}</h3>
                <p class="inline text-admin_text_btn2 italic">{{$value->created_at}}</p>
                <p>{{$value->comment}}</p>
            
                @isset($value->answer_text)
                    <div class="mt-10">
                        <h2 class="text-2xl">Ответ дан!</h2>
                        <p class="text-lg mt-4">Автор: {{$value->u_name}} <span class="italic">({{$value->role}})</span></p>
                        <div class="mt-6">
                            {!! $value->answer_text !!}
                        </div>
                    </div>
                    @endisset
            </div>
    </div>
    @endforeach
    </section>
    @endif
    
    {{-- Ваши заявки --}}
    @if (count($zayavki) > 0)
    <section class="mobile:ml-10 max-mobile:mt-10">

    <h2 class="text-2xl">Ваши заявки: </h2>
    
    <div class="mt-10">
            <table class="w-full">
            <thead class="border-2">
                <tr class="text-left">
                    <th class="border-2 border-admin_black">#</th>
                    <th class="border-2 border-admin_black">Заказ</th>
                    <th class="border-2 border-admin_black">Статус</th>
                </tr>
            </thead>
		<tbody class="border-2 border-admin_black">
        @foreach($zayavki as $key => $value)
                <tr>
                    <td class="border-2 border-admin_black">
                        {{$key}}
                    </td>
                    <td class="border-2 border-admin_black">
                        {{-- {{$value->monsters}} --}}
                            <button type="button" 
                            onclick="window.location.href='{{route('zayavki.show', ['id' => $value->id])}}'" 
                            class="hover:bg-admin_menu_btn  hover:text-white w-full h-[36px]  transition-all duration-200 ease-in">
                                Посмотреть...
                            </button>
                    </td>
                    <td class="border-2 border-admin_black">
                        {{$value->status}}
                    </td>
                </tr>
        @endforeach
    </div>

    </section>
    @endif

        </div>
    </div>



@endsection