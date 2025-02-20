// Родительский класс спойлера
const menu_spoiler = document.getElementById("menu_spoiler");

/**
 * Кнопка для открытия спойлера
 * @type {HTMLElement} btn_menu_spoiler
 */
var btn_menu_spoiler = menu_spoiler.children.btn_menu_spoiler;


/**
 * Сам спойлер
 * @type {HTMLElement} menu_spoiler2
 */
var menu_spoiler2 = menu_spoiler.children.menu_spoiler2;

btn_menu_spoiler.addEventListener("click", function() {
    menu_spoiler2.classList.toggle("hidden");
});