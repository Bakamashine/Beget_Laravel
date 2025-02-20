<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MonstersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Type_MonsterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ZayavkiController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $monster = new MonstersController();
    
    return view("index", [
        'data' => $monster->data()
        ->latest('created_at')
        ->limit(3)
        ->get()]);
})->name("main");

// О нас
Route::view("/main/about_us", "about_us")->name("about_us");

// Чем их кормить
Route::view("/eat", 'eat')->name("eat");


// Доступно только администратору
Route::middleware("admin")->group(function() {
    Route::name("user_management")
    ->controller(UserController::class)
    ->group(function () {
            
            // Основная страница
            Route::get("/user_management", 'up');

            // Добавление информации
            Route::post("/user_management/add", "create")->name(".store");

            // Показ детальной информации
            Route::get("/user_management/{user}/show", "show")->name(".show");

            // Редактирование
            Route::get("/user_management/{user}/edit", "edit")->name(".edit");
            Route::patch("/user_management/{user}/patch", "update")->name(".update");
        
            // Удаление
            Route::delete("/user_management/delete", "delete")->name('.delete');
    });
});

Route::middleware("moderator")->group(function () {
    
    // Основная административная страница
    Route::get("/admin", [AdminController::class, 'up'])->name("admin");

    // Галерея
    Route::name("gallery")
    ->controller(GalleryController::class)
    ->group(function () {
        
        // Открытие галереи
        Route::get("/gallery", "up");
        
        // Добавление файлов в галерею
        Route::post("/gallery/add", "store")->name(".store");
        
        // Генерирование изображений (13.02.25 не работает)
        Route::get("/gallery/generate", "generate")->name(".generate");
    });
    
Route::name("answer")
->controller(FeedBackController::class)
->group(
    function () {
        Route::get("/answer", 'up');
        Route::get("/answer/{id}/make", "make")->name(".make") ;
        Route::post("/answer/add", "store")->name(".store");
    }
);

// Обновление заявки
Route::post('/zayavki/newstatus', [ZayavkiController::class, 'updateStatus'])->name('zayavki.update');

// CRUD типов монстров
Route::name("type_monsters")
    ->controller(Type_MonsterController::class)
    ->group(function () {
        
        // Открытие главной страницы
        Route::get("/type_monsters", "up");
        
        // Добавление информации
        Route::post("/type_monsters/add", "store")->name(".store");
        
        // Показ детальной информации
        Route::get("/type_monsters/{monster}/show", "show")->name(".show");
        
        // Редактирование
        Route::get("/type_monsters/{monster}/edit", "edit")->name(".edit");
        Route::patch("/type_monsters/{monster}/patch", "update")->name(".update");

        // Удаление
        Route::delete("/type_monsters/delete", "delete")->name('.delete');
});

// CRUD монстров
Route::name("monsters")
    ->controller(MonstersController::class)
    ->group(function () {

            // Открытие главной страницы о монстрах
            Route::get("/monsters", 'up');

            // Добавление информации
            Route::post("/monsters/add", "store")->name(".store");

            // Показ детальной информации
            Route::get("/monsters/{monster}/show", "show")->name(".show");

            // Редактирование
            Route::get("/monsters/{monster}/edit", "edit")->name(".edit");
            Route::patch("/monsters/{monster}/patch", "update")->name(".update");
        
            // Удаление
            Route::delete("/monsters/delete", "delete")->name('.delete');
        }
    );
});


Route::middleware("auth")->group(function () {

    // Домашняя страница
    Route::controller(HomeController::class)
    ->name('home')
    ->group(function () {
        Route::get("/home", 'up');
        
        Route::view("/home/avatar", 'home.avatar')->name('.avatar');
        Route::put("/home/make_avatar", 'loadAvatar')->name(".loadAvatar");
    });

    // Страница с монстрами
    Route::name("products")
    ->controller(ProductsController::class)
    ->group(function () {
        
        // Открытие страницы для добавление монстров в корзину
        Route::get("/products", "up");
        Route::get("/products/{monster}", "show")->name(".show");
            
        Route::post("/products/add", 'addCart')->name('.addCart');
    });
    
    // Страница с созданием комментария
    Route::controller(CommentsController::class)
    ->name("comments")
    ->group(function () {
            Route::view("/comments", 'comments');
            Route::post('/comments/add', 'store')->name(".store");

    });
    
    // "Желаемое"
    Route::controller(CartController::class)
    ->name("cart")
    ->group(function () {
        Route::get("/cart", 'up');
        Route::delete('/cart/{id}/delete', 'delete')->name(".delete");
    });
    
    Route::controller(ZayavkiController::class)
    ->name('zayavki')
    ->group(
        function () {
            Route::post('/zayavki/add', 'add');
            Route::get("/zayavki/{id}/detail", 'show')->name('.show');
        }
    );
});