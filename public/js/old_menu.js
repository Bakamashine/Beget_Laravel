
/** Класс для замены селекторов  */
class ReplaceSelector {
    
    /**
     * Конструктор класса ReplaceSelector
     * @param {Array} old 
     * @param {Array} new 
     * @param {Object} object
     */
    constructor(old, new_s, object, old_2, new_2, object_2) {
        this.old = old;
        this.new = new_s;
        this.object = object;

        this.old_2 = old_2;
        this.new_2 = new_2;
        this.object_2 = object_2;
    }

    /** Проверяет на схожесть массива и название селекторов
     * @param {Array} arr Входимый массив с селекторами
     * @param {Array} arr2 Сам объект (btns.classList)
     */
    static _checkold(arr, arr2) {
        for (let i = 0; i<arr; i++) {
            if (arr[i] != arr2[i]) {
                return false; 
            }
        }
        return true;
    }

    /**
     * Копирование из объекта в массив
     * @param {Object} arr2 Объект, из которого нужно скопировать
     * @returns Array
     */
    static _copyArray(arr2) {
        let arr1 = new Array;
        for (let i = 0; i<arr2.length; i++) {
            arr1[i] = arr2[i];
        }
        return arr1;
    }

    /**
     * Чистит селекторы
     * @param {Object} arr 
     */
    static _cleanSelector(arr) {
        let vremarr = ReplaceSelector._copyArray(arr);

        for (let i = 0; i<vremarr.length; i++) {
            arr.remove(vremarr[i]);
        }
    }

    /**
     * Добавляет селекторы
     * @param {Object} arr 
     * @param {Array} arr2
     */
    static _addSelector(arr, arr2) {
        for (let i = 0; i<arr2.length; i++) {
            arr.add(arr2[i]);
        }
    }

    // Скрытие или раскрытие кнопок
    static _showOrHideBtn() {
        burger.classList.toggle("hidden");
        exit_menu.classList.toggle("hidden");
        body.classList.toggle("bg-gray-400")
        btns.classList.toggle("max-header:hidden");
    }

    /**
     * Добавляет или удаляет селекторы
     * @param {Object} obj 
     * @param {Array} arr 
     */
    static _RemoveOrAdd(obj, arr)  {
        ReplaceSelector._cleanSelector(obj);
        ReplaceSelector._addSelector(obj, arr);
    }

    /**
     * Открывает меню
     */
    show() {
        if (ReplaceSelector._checkold(this.old, this.object) &&
            ReplaceSelector._checkold(this.old_2, this.object_2)) {

            // Удаление старых и добавление новых заранее заготовленных селекторов
            ReplaceSelector._RemoveOrAdd(this.object, this.new);
            ReplaceSelector._RemoveOrAdd(this.object_2, this.new_2);
            
            // Скрытие элементов
            ReplaceSelector._showOrHideBtn();
        } 
    }

    /**
     * Скрывает меню
     */
    hide() {
        
        // Удаление новых селекторов и установка старых
        ReplaceSelector._RemoveOrAdd(this.object, this.old);
        ReplaceSelector._RemoveOrAdd(this.object_2, this.old_2);

        // Раскрытие элементов
        ReplaceSelector._showOrHideBtn();
    }
}


// Кнопка открытия меню
const burger = document.getElementById("burger");

// DIV с кнопками
const btns = document.getElementById("btns");

// Секция с меню
const section_menu = document.getElementById("section-menu");

// DIV с меню
const menu = document.getElementById("menu");

// Кнопка закрытия меню
const exit_menu = document.getElementById("exit-menu");

// Тело сайта
const body = document.getElementsByTagName("body")[0];

// Все селекторы в section:

// Старые селекторы section
const section_old_selector = ["max-h-full", "header:w-1/5", "max-header:w-20", "mt-20", "ml-auto"]; 

// Новые селекторы section
const section_new_selector = ["bg-white", "h-full", "float-end", "absolute", "top-0", "right-0", "w-[80%]", "border-l-2", "border-slate-600", "transition-all", "duration-[400ms]", "ease-linear"];

// Старые селекторы menu
const menu_old_selector = ["sticky", "top-0", "border-t-2", "border-l-2", "rounded-tl-3xl", "border-slate-600", "border-b-2", "rounded-bl-3xl"];

// Новые селекторы menu
const menu_new_selector = [];

// Добавление значений в класс 
let replace = new ReplaceSelector(
    section_old_selector,
    section_new_selector,
    section_menu.classList,

    menu_old_selector,
    menu_new_selector,
    menu.classList
)

// Довление действия на кнопку открытия меню
burger.addEventListener("click", function() {

    replace.show();
    // console.log(this);
});

// Добавление действия на кнопку закрытия меню
exit_menu.addEventListener("click", function () {
    replace.hide();
})
