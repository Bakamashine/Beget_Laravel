@extends('layouts.app')

@section('title', 'Желаемое')

@section('content')
   
    <h2 class="text-center text-2xl">Желаемое</h2>

    @if (count($data) > 0)
    {{-- <div class="flex  "> --}}
        <div class="flex flex-wrap justify-center space-y-10">
        @foreach($data as $value)
            
<div class="mr-10 mt-10 mobile:w-96 max-mobile:w-11/12  max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="{{$value->monster->gallery->path}}" alt="" />
    <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$value->monster->name}}</h5>
        <p id="slag" class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$value->monster->price}} рублей</p>
        
        <form method="post" action="{{route('cart.delete', ['id' => $value->id])}}">
            @csrf
            @method('delete')
            <button 
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
            >
            Отмена
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
            </button>
        </form>
    </div>
</div>
        @endforeach
        </div>

    <div class="ml-auto mt-10 bg-white border-2 border-wp-border space-y-4  p-6">
        <div class=" top-0">
        <p class="text-center">Итоговая сумма: </p>
        <p class="text-center" id="sum"> </p>
        
        <form method="post" class="mt-10" action="{{route('zayavki')}}">
            @csrf
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Отправить на рассмотрение
            </button>
        </form>
        </div>
    </div>

    </div>
    @else
        <h1 class="text-3xl text-center mt-10">Корзина пуста</h1>
    @endif
    <script src="/js/summ.js"></script>
@endsection