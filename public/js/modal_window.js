// Кнопка для открытия окна
const openWindow = document.getElementById("openWindow");

// Кнопка для принятия изображения
const acceptImage = document.getElementById("acceptImage");

// Само модальное окно
const modal = document.getElementById("modal");

// Массив с input:radio
const radio = document.querySelectorAll("[id^='radio']");

// Скрытый input который принимает id картинки
const hidden_input = document.getElementById("hidden-input");

// Кнопка для закрытия окна
const closeWindow = document.getElementById("closeWindow");


// Инцилизация значения
var value;

// Очистка значения которое остаётся после перезагрузки
clear = () => {
    if (hidden_input.value !== "")  {
        hidden_input.value = "";
    }
}

// Добавление к каждому input:radio действие
radio.forEach(elem => {
    elem.addEventListener("click", function () {

        value = elem.value;
        if (value !== undefined) {
            hidden_input.value = value;
        }

    })
})

// Открытие окна
openWindow.addEventListener("click", function () {
    modal.classList.toggle("hidden");
})

// Принятие изображения и закрытие окна
acceptImage.addEventListener("click", function () {
    modal.classList.toggle("hidden");
    openWindow.textContent = `Изображение ${value} загружено!`;
})

// Просто закрытия окна
closeWindow.addEventListener("click", () => {
    modal.classList.toggle("hidden");
})