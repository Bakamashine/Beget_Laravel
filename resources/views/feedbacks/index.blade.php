@extends('layouts.admin_header')

@section('title', 'Написание комментария')

@section('content')
    <h2 class="text-2xl">Просмотр отзывов</h2>
@if (count($data) > 0)
    @foreach($data as $value)
    <div class="mt-20 mobile:w-1/2 max-mobile:w-full p-12 border-[1px] border-wp_border flex">
            <div class="min-w-24">
                <img src="{{$value->images}}" alt="" class="w-24">
            </div>
            
            <div class="ml-6">
                <h3 class="inline font-semibold text-xl">{{$value->title}}</h3>
                <p class="inline text-admin_text_btn2 italic">{{$value->created_at}}</p>
    @if (!isset($value->answer_text, $value->u_name))
    <a 
    class="block w-[80px] hover:text-admin_menu_btn transition-all duration-75 ease-linear" 
    href="{{route('answer.make', ['id' => $value->id])}}">Ответить</a>
    @endif
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
    @else
	    <p class="text-center">Отзывов нет</p>
@endif
    
<div class="flex justify-center items-center mt-10">
{{$data->links()}}
</div>
@endsection
