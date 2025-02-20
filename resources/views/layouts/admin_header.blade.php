<!DOCTYPE html>
<html lang="ru">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="icon" href="/img/wordpress.png" type="image/x-icon">
  <script src="/js/menu_spoiler.js" defer></script>
  <script src="/js/menu.js" defer></script>
  <title>@yield('title')</title>
</head>

<body class="h-full bg-admin_wallpaper">
    <header class="bg-admin_black h-[32px]">

            <div class="flex h-full">
            
                {{-- Кнопки слева --}}
        <div class="flex">

            {{-- Кнопка для перехода на основной сайт --}}
            <div class="h-full group hover:bg-admin_black_hover w-12  transition-all duration-[400ms] ease-in-out">
                <button class="h-full w-full flex justify-center items-center" onclick="window.location.href='{{route('main')}}'">
                        <svg class="group-hover:fill-admin_svg_hover fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" width="24"><g xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zM3.5 12c0-1.232.264-2.402.736-3.459L8.291 19.65A8.5 8.5 0 013.5 12zm8.5 8.501c-.834 0-1.64-.122-2.401-.346l2.551-7.411 2.613 7.158a.718.718 0 00.061.117 8.497 8.497 0 01-2.824.482zm1.172-12.486c.512-.027.973-.081.973-.081.458-.054.404-.727-.054-.701 0 0-1.377.108-2.266.108-.835 0-2.239-.108-2.239-.108-.459-.026-.512.674-.054.701 0 0 .434.054.892.081l1.324 3.629-1.86 5.579-3.096-9.208c.512-.027.973-.081.973-.081.458-.054.403-.727-.055-.701 0 0-1.376.108-2.265.108-.16 0-.347-.004-.547-.01A8.491 8.491 0 0112 3.5c2.213 0 4.228.846 5.74 2.232-.037-.002-.072-.007-.11-.007-.835 0-1.427.727-1.427 1.509 0 .701.404 1.293.835 1.994.323.566.701 1.293.701 2.344 0 .727-.28 1.572-.647 2.748l-.848 2.833-3.072-9.138zm3.101 11.332l2.596-7.506c.485-1.213.646-2.182.646-3.045 0-.313-.021-.603-.057-.874A8.455 8.455 0 0120.5 12a8.493 8.493 0 01-4.227 7.347z"></path></g></svg>                    
                </button>
            </div>

            {{-- Кнопка для перехода на административную панель --}}
            <div class="h-full group hover:bg-admin_black_hover w-12  transition-all duration-[400ms] ease-in-out">
                <button class="h-full w-full flex justify-center items-center" onclick="window.location.href='{{route('admin')}}'">
                        <svg class="group-hover:fill-admin_svg_hover fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" width="24"><g xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zM3.5 12c0-1.232.264-2.402.736-3.459L8.291 19.65A8.5 8.5 0 013.5 12zm8.5 8.501c-.834 0-1.64-.122-2.401-.346l2.551-7.411 2.613 7.158a.718.718 0 00.061.117 8.497 8.497 0 01-2.824.482zm1.172-12.486c.512-.027.973-.081.973-.081.458-.054.404-.727-.054-.701 0 0-1.377.108-2.266.108-.835 0-2.239-.108-2.239-.108-.459-.026-.512.674-.054.701 0 0 .434.054.892.081l1.324 3.629-1.86 5.579-3.096-9.208c.512-.027.973-.081.973-.081.458-.054.403-.727-.055-.701 0 0-1.376.108-2.265.108-.16 0-.347-.004-.547-.01A8.491 8.491 0 0112 3.5c2.213 0 4.228.846 5.74 2.232-.037-.002-.072-.007-.11-.007-.835 0-1.427.727-1.427 1.509 0 .701.404 1.293.835 1.994.323.566.701 1.293.701 2.344 0 .727-.28 1.572-.647 2.748l-.848 2.833-3.072-9.138zm3.101 11.332l2.596-7.506c.485-1.213.646-2.182.646-3.045 0-.313-.021-.603-.057-.874A8.455 8.455 0 0120.5 12a8.493 8.493 0 01-4.227 7.347z"></path></g></svg>                    
                </button>
            </div>

        </div>

            
        <div class="ml-auto mr-2 flex">
            {{-- Вопросительный знак --}}
            <div class="h-full group hover:bg-admin_black_hover w-12  transition-all duration-[400ms] ease-in-out">
                <button class="h-full w-full flex justify-center items-center" onclick="window.location.href='{{route('about_us')}}'">
                    <svg class="group-hover:fill-admin_svg_hover fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1 16v-2h2v2h-2zm2-3v-1.141A3.991 3.991 0 0016 10a4 4 0 00-8 0h2c0-1.103.897-2 2-2s2 .897 2 2-.897 2-2 2a1 1 0 00-1 1v2h2z"></path></svg>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1 16v-2h2v2h-2zm2-3v-1.141A3.991 3.991 0 0016 10a4 4 0 00-8 0h2c0-1.103.897-2 2-2s2 .897 2 2-.897 2-2 2a1 1 0 00-1 1v2h2z"></path>
                    </svg>
                </button>
            </div>

             {{-- Аккаунт --}}
            <div id="parent_account" class="h-full">


                {{-- 
                При наводке на кнопку, появляется кнопка с выходом
                Если же нажать, то перенаправит в личный кабинет
                --}}
                @auth
                <div class="h-full group hover:bg-admin_black_hover w-72  transition-all duration-[400ms] ease-in-out">
                    <button id="account" onclick="window.location.href='{{route('home')}}'" class="h-full w-full flex justify-center items-center group-hover:text-admin_svg_hover text-white">
                        {{Auth::user()->name}}
                        @isset(Auth::user()->avatar)
                        <img src="{{Auth::user()->avatar}}" class="rounded-full w-6 ml-4">
                        @endisset
                    </button>
                </div>
                @endauth
                
            {{-- Панель --}}
            <div id="user_panel" class="hidden flex flex-col bg-admin_black_hover">

                    {{-- Выход --}}
                    <div class="group flex h-11">
                        <div class="group-hover:bg-admin_menu_btn2  transition-all duration-75 ease-linear h-full w-1"></div>
                        <form method="post" action="{{route('logout')}}" class="w-full">
                           @csrf 
                        <button class="p-2 text-admin_text_btn2 w-full hover:text-admin_menu_btn2 transition-all duration-75 ease-linear">Выход</button>
                        </form>
                    </div>

            </div>
        </div>
        <script>
            
            // TODO: 51 строка 
            account.addEventListener("mouseover", () => {
                user_panel.classList.remove("hidden");
            })

            // TODO: 57 строка
            user_panel.addEventListener("mouseout", function () {
                this.classList.add("hidden");
            })
        </script>

            </div>

    </header>
    
    <div class="flex h-full w-full">
    
        <div class="absolute  left-0 mobile:hidden max-mobile:block h-full w-12">
        <button id="showMenu" 
        class="my-auto bg-admin_black rounded-sm sticky mt-3 top-12 p-2 "
        >
            <img class="" src="/img/burger.svg">
        </button>
    </div>

    {{-- Административное меню --}}
    <section id="admin-menu" 
    class="bg-admin_black w-[272px] max-mobile:h-full max-mobile:pt-10 pb-[100%] max-mobile:absolute max-mobile:w-full max-mobile:left-0 max-mobile:top-0 mobile:block  duration-200 ease-in transition-transform max-mobile:-translate-x-full "
    >
        
        <a href="javascript:void(0)" id="closeMenu" class="mobile:hidden group block hover:bg-admin_menu_btn h-10 text-admin_text_color flex">
            <div class="group-hover:bg-white transition-all duration-75 ease-linear h-full w-1"></div>
            <p class="p-2">Закрыть меню</p>
        </a>
        <div class="pt-2">

            <a href="{{route("admin")}}" class="group block max-mobile:border-t-2 max-mobile:border-b-2 max-mobile:border-red-500 hover:bg-admin_menu_btn h-10 text-admin_text_color flex">
                <div class="group-hover:bg-white transition-all duration-75 ease-linear h-full w-1"></div>
                <p class="p-2">Главная</p>
            </a>

            <a href="{{route("gallery")}}" class="group block hover:bg-admin_menu_btn h-10 text-admin_text_color flex">
                <div class="group-hover:bg-white transition-all duration-75 ease-linear h-full w-1"></div>
                <p class="p-2">Галерея</p>
            </a>

            <a href="{{route("user_management")}}" class="group block hover:bg-admin_menu_btn h-16 text-admin_text_color flex">
                <div class="group-hover:bg-white transition-all duration-75 ease-linear h-full w-1"></div>
                <p class="p-2">Управление пользователями</p>
            </a>

        <div id="menu_spoiler">
            <a href="javascript:void(0)" id="btn_menu_spoiler" class="group block hover:bg-admin_menu_btn h-10 text-admin_text_color flex">
                <div class="group-hover:bg-white transition-all duration-75 ease-linear h-full w-1"></div>
                    <p class="p-2">Монстры</p>
            </a>

            <div id="menu_spoiler2" class=" bg-admin_black_hover hidden">

                <a href="{{route("type_monsters")}}" class="group block hover:text-admin_menu_btn2  h-8 text-sm text-admin_text_btn2 flex">
                    <div class="group-hover:bg-admin_menu_btn2  transition-all duration-75 ease-linear h-full w-1"></div>
                    <p class="p-2">Типы монстров</p>
                </a>

                <a href="{{route("monsters")}}" class="group block hover:text-admin_menu_btn2  h-8 text-sm text-admin_text_btn2 flex">
                    <div class="group-hover:bg-admin_menu_btn2  transition-all duration-75 ease-linear h-full w-1"></div>
                    <p class="p-2">Добавление монстров</p>
                </a>

            </div>
        </div>

            <a href="{{route('answer')}}" class="group block hover:bg-admin_menu_btn h-10 text-admin_text_color flex">
                <div class="group-hover:bg-white transition-all duration-75 ease-linear h-full w-1"></div>
                <p class="p-2">Отзывы</p>
            </a>

            
            <form method="post" action="{{route('logout')}}" class="w-full mobile:hidden mt-10 ml-3.5">
                @csrf 
                <button class="hover:bg-admin_menu_btn h-10 text-admin_text_color">Выход</button>
            </form>

            {{-- Прикол --}}
            <a href="javascript:void(0)" onclick="
            document.getElementsByTagName('body')[0].classList.add('animate-spin')
            " class="group block hover:bg-admin_menu_btn h-10 text-admin_text_color flex">
                <div class="group-hover:bg-white transition-all duration-75 ease-linear h-full w-1"></div>
                <p class="p-2">Не нажимать!</p>
            </a>
        </div>

    </section>

    <section class="mt-[50px] w-full mx-[35px] h-full">
        @yield('content')
    </section>

    </div>
</body>