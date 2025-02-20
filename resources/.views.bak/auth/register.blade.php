@extends('../layouts/app')

@section('title', 'Регистрация')

  
@section('content')
  
  
    <section
      class="shadow-2xl border-black border-2 rounded-lg h-[800px] w-[628px] bg-white grid justify-center items-center ">
      <h1 class="text-center text-5xl">Регистрация</h1>
      <form method="post" action="{{route("register.store")}}">

        @csrf

        <!-- Имя -->
        <div class="">
          <label class="block">Ваше имя: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md @error('name') is_invalid @enderror" type="text"
            name="name" id="name" value="{{old("name")}}" required>
        @error("name")
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        </div>


        <!-- Фамилия -->
        <div class="mt-6">
          <label class="block">Ваша фамилия: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md @error('surname')
            is_invalid  
          @enderror" type="text"
            name="surname" id="surname" value="{{old("surname")}}" required>
        @error("surname")
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>

        <!-- Отчество -->
        <div class="mt-6">
          <label class="block">Ваше отчество: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md @error("patronymic") is_invalid @enderror" type="text"
            name="patronymic" id="patronymic" value="{{old("patronymic")}}">
        @error("patronymic")
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>

        <!-- Почта -->
        <div class="mt-6">
          <label class="block">Ваша почта: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md @error('email')
            is_invalid  
          @enderror" type="email"
            name="email" id="email" value="{{old("email")}}" required>
        @error("email")
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>

        <!-- Пароль -->
        <div class="mt-6" id="pass">
          <label class="block">Введите пароль: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md @error('password')
            
          @enderror" type="text"
            name="password" id="pass1" value="{{old("pass1")}}" required>
        </div>

        <!-- Повторение пароля -->
        <div class="mt-6">
          <label class="block">Повторите пароль: </label>
          <input class="mt-2 border-black border-2 h-[35px] w-[500px] pl-2 focus:border-black rounded-md"
            type="password" name="password_confirmation" id="pass2" required>
        </div>

        @error("password")
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
        <!-- Соглашение с правилами регистрации -->

        {{-- <div class="flex items-center mt-6">
          <input checked id="checked-checkbox" type="checkbox" value=""
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Согласны ли вы
            с
            условиями регистрации?</label>
        </div> --}}

        <div class="mt-6 flex justify-center items-center">
          <input
            class="cursor-pointer rounded-xl hover:bg-cyan-600 flex justify-center items-center  bg-cyan-400  w-52 h-10"
            type="submit" name="" value="Регистрация">
        </div>


        <div class="flex justify-center items-center mt-6">
          <a class="border-b-[1px] border-black hover:text-cyan-600 hover:border-cyan-600" href="{{route("login")}}">Вы уже
            зарегистрированы?</a>
        </div>
      </form>

    </section>

    <!-- <script src="js/Validate.js"></script> -->

@endsection
