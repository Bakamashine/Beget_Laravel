@extends('../layouts/app')

@section('title', 'Авторизация')

  
@section('content')

    <section
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

    </section>

@endsection
