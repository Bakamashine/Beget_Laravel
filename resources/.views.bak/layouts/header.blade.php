<!DOCTYPE html>
<html lang="ru">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset("css/app.css")}}">
  {{-- <script src="/js/menu.js" defer></script> --}}
  <title>@yield('title')</title>
</head>

<body class="">

  <section class="bg-white"> 
  <!-- Шапка -->
  <header class="h-28 bg-header_color ">

    <div class="absolute w-full text-center pt-3 text-2xl left-0">
      <h1 class="">МонстроПолис</h1>
      <p class="text-sm italic">Взгляни в лицо своему ужасу и построй с ним будущее</p>
    </div>


        <div class="flex right-4 top-2 absolute max-header:hidden">
          <img src="/img/location.svg" class="w-6 mr-3">
          <p class="text-sm">Город Санкт-Петербург<br>Ул. Колопайкина дом 8а</p>
        </div>

        <div class="flex left-4 top-2  absolute max-header:hidden">
          <img src="/img/phone.svg" class="w-6 mr-3">
          <p class="text-sm">Звоните по номеру:<br>+7 (898) 530 76-74</p>
        </div>

    <div class="h-full flex items-end">
      <div class="flex w-full h-9 shadow-lg">
        <a href="{{route("main")}}" class="block w-1/3 text-center border-t-2 border-r-2 border-slate-600 hover:bg-slate-400">
          <div>
            Главная
          </div>
        </a>

        <a href="" class="block w-1/3 text-center border-t-2 border-r-2 border-slate-600 hover:bg-slate-400">
          <div>
            Контакты
          </div>
        </a>

        <a href="" class="block w-1/3 text-center border-t-2  border-slate-600 hover:bg-slate-400">
          <div>
            Корзина
          </div>
        </a>

      </div>
    </div>

  </header>
  
  @yield('content')
  
</body>
</html>
