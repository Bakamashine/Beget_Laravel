<!DOCTYPE html>
<html lang="ru">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset("css/app.css")}}">
  <script src="/js/menu.js" defer></script>
  <title>@yield('title')</title>
</head>

<body class="bg-gray-800">

  <section class="bg-white header:mt-24 header:ml-32 header:mr-32 header:shadow-lg header:h-full">
  <!-- Шапка -->
  <header class="h-28 bg-header_color ">

    <div class="absolute w-full text-center pt-3 text-2xl left-0">
      <h1 class="">МонстроПолис</h1>
      <p class="text-sm italic">Взгляни в лицо своему ужасу и построй с ним будущее</p>
    </div>


        <div class="flex header:right-36 max-header:right-4 max-header2:hidden  absolute">
          <img src="/img/location.svg" class="w-6 mr-3">
          <p class="text-sm">Город Санкт-Петербург<br>Ул. Колопайкина дом 8а</p>
        </div>

        <div class="flex header:left-36 max-header:left-4 max-header2:hidden  absolute">
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


  <div class="flex">

    <div class="mt-20 p-10 pb-32">
  <!-- Основной контент -->
  @yield('content')

    </div>

  <!-- Второстепенное меню -->
  <section id="section-menu" class="max-h-full  header:w-1/5 max-header:w-20 mt-20 ml-auto">
    <div id="menu" class="sticky top-0  border-t-2 border-l-2 rounded-tl-3xl border-slate-600  border-b-2 rounded-bl-3xl">
      <!--
	  Монстры на заказ
	  Сезонные предложения
	  Чем их кормить?
	  О нас
	  -->

    <button id="burger" class="p-3 header:hidden">
      <img src="/img/burger.svg" alt="" class="invert">
    </button>
    <div class="pl-3">
      <button id="exit-menu" class="p-3 hidden border-2 border-black rounded-md">
        Закрыть
      </button>
    </div>



    <div class="max-header:hidden" id="btns">

      @guest
      <a href="{{route("register")}}" class="block p-3 border-b-2 border-slate-300 header:rounded-tl-3xl hover:bg-slate-300 text-center">
        <div>Регистрация</div>
      </a>

      <a href="{{route("login")}}" class="block p-3 border-b-2 border-slate-300  hover:bg-slate-300 text-center">
        <div>Авторизация</div>
      </a>
      @endguest

      @auth
      <a href="#" class="block p-3 border-b-2 border-slate-300  hover:bg-slate-300 header:rounded-tl-3xl text-center">
        <div>Аккаунт</div>
      </a>

      <form method="post" action="{{route("logout")}}">
        @csrf
        <button class="p-3 border-b-2 border-slate-300 hover:bg-slate-300 w-full" type="submit">Выход</button>
      </form>
      @endauth

      <a href="{{route("feedback")}}" class="block p-3 border-b-2 border-slate-300  hover:bg-slate-300 text-center">
        <div>Отзывы</div>
      </a>

      <a href="" class="block p-3 border-b-2 border-slate-300  hover:bg-slate-300 text-center">
        <div>Монстры на заказ</div>
      </a>

      <a href="" class="block p-3 border-b-2 border-slate-300 hover:bg-slate-300 text-center">
        <div>Сезонные предложения</div>
      </a>

      <a href="" class="block p-3 border-b-2 border-slate-300 hover:bg-slate-300 text-center">
        <div>Чем их кормить?</div>
      </a>

      <a href="{{route("about_us")}}" class="block p-3 header:rounded-bl-3xl  hover:bg-slate-300 text-center">
        <div>О нас</div>
      </a>

    </div>
    </div>
  </section>

</div>

</section>

</body>

</html>
