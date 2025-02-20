<section id="modal" 
class="absolute m-auto top-0 left-0 right-0 bottom-0 bg-white shadow-md w-[1400px] h-[1000px]  p-11 hidden"
>

    <h2 class="text-2xl text-center">Ваша галерея:</h2>

    @if (count($imgs) > 0)
    <div class="flex flex-wrap justify-center  pt-28">
        @foreach($imgs as $img)
            <div class="mr-10 mt-4">
                <img src="{{$img->path}}" class="size-48">
                <input  class="mx-auto mt-5 block" type="radio" name="radio_img" id="radio" value="{{$img->id}}"> 
            </div>
        @endforeach
    </div>
        <div>
            <button type="button" id="acceptImage"  class="hover:bg-blue-500 hover:text-white w-[240px] h-[36px] rounded-xl transition-all duration-200 ease-in">
            Загрузить изображение!
            </button>

            <button type="button" id="closeWindow"  class="hover:bg-blue-500 m-10 hover:text-white w-[240px] h-[36px] rounded-xl transition-all duration-200 ease-in">
            Выйти из галереи
            </button>
        </div>
    @else
    <div class="pt-28">
        <p class="text-center">У вас нет изображений! Пожалуйста, загрузите изображение по ссылке ниже</p>
    </div>
    @endif
        
        <button onclick="window.location.href='{{route('gallery')}}'" type="button"  class="hover:bg-blue-500 hover:text-white w-[240px] h-[36px] rounded-xl transition-all duration-200 ease-in">
            Перейти в галерею
        </button>
</section>


    <script src="/js/modal_window.js"></script>