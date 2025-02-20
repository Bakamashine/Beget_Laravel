@extends('../layouts/app')

@section('title', 'Авторизация')

  
@section('content')

    {{-- <section
      class="shadow-2xl border-black border-2 rounded-lg h-[613px] w-[628px] bg-white grid justify-center items-center ">
      <h1 class="text-center text-5xl">Авторизация</h1>
      <form method="post" action="{{route("login.store")}}">

        @csrf

        <!-- Почта -->
        <div class="mt-6">
          <label class="block">Ваша почта: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md @error('email') is_invalid @enderror" type="email"
            name="email" id="email" value="{{old("email")}}" required>
          @error("email")
            <p class="error_feedback">{{$message}}</p>
          @enderror
        </div>

        <!-- Пароль -->
        <div class="mt-6" id="pass">
          <label class="block">Введите пароль: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md @error('password') is_invalid @enderror" type="text"
            name="password" id="pass1" required>
          @error("password")
            <p class="error_feedback">{{$message}}</p>
          @enderror
        </div>


        <div class="mt-6 flex justify-center items-center">
          <input
            class="cursor-pointer rounded-xl hover:bg-cyan-600 flex justify-center items-center  bg-cyan-400  w-52 h-10"
            type="submit" name="" value="Авторизация">
        </div>


        <div class="flex justify-center items-center mt-6">
          <a class="border-b-[1px] border-black hover:text-cyan-600 hover:border-cyan-600" href="{{route("register")}}">Вы не зарегистрированы?</a>
        </div>
      </form>

    </section> --}}
    

    
    <h2 class="text-2xl">Авторизация</h2>
	<form method="post" class="space-y-4" action="{{route("login.store")}}">
		@csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Почта</label>
                <input type="email"  name="email" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('email')
                    {{$message}}
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('password')
                    {{$message}}
                @enderror
            </div>


            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Авторизироваться
            </button>
    </form>

@endsection
