"use strict"
class Tags {

	/**
	 * Принимает массив кнопок
	 * @param {NodeList} arr Массив кнопок
	 * @param {HTMLElement} textarea Само поле
	 */
	constructor (arr, textarea) {
		this.arr = arr;
		this.tags = {
			"red": (name) => `<span style="color: red;">${name}</span>`,
			"green": (name) => `<span style="color: green;">>${name}</span>`,
			"br": () => "<br>",
			// "img": (name) => `<img src='${name}' width='100px' height='100px'>`
		}
		this.textarea = textarea;
	}

	/**
	 * Получает строку из выделенной строки
	 */
	get_selected_text() {
		let start = this.textarea.selectionStart;
		let end = this.textarea.selectionEnd;
		
		if (start !== end) {
			let selectedText = this.textarea.value.substring(start, end);
			return selectedText;
		}
	}

	/**
	 * Получение массива
	 * @returned {Array}
	 */
	getArr = () => {
		return this.arr;
	}


	/**
	 * Добавляет действие кнопкам
	 * @param {HTMLElement} text тег, в который будет добавлятся вёрстка
	 * @param {HTMLElement} newhtml тег в который будет выводится результат вывода
	 */
	addEvent() {
		let arr = this.arr;
		let tags = this.tags;
		let index = 0;
		for (let n in tags) {
			
			// Добавление значение кнопкам
			arr[index].addEventListener("click", () => {
				
				// Считывает выделенный текст
				let newtext = this.get_selected_text();
			
				// Заменяет выделенный текст на текст с тегом
				this.textarea.value = this.textarea.value.replace(newtext, "");
				
				// Добавляет в форму результат
				this.textarea.value += tags[n](newtext);
			});
			index++;
		}
	}
	
	/**
	 * Выводит в отдельный тег полученный результат
	 * @param {HTMLElement} newhtml 
	 * @param {String} text 
	 */
	show(newhtml, text) {
		newhtml.innerHTML = text;
	}
}



// Кнопки для добавление тегов
const btns = document.querySelectorAll("[id^='add_tag']");

// Текстовое поле
const textarea = document.getElementById("text");

// Кнопка для проверки поля
const ok = document.getElementById("ok");

// Отдельный div для вывода ответа 
let newhtml = document.getElementById("newhtml");


let tags = new Tags(btns, textarea);
tags.addEvent(textarea);

ok.addEventListener("click", () => {
		console.log(window.getSelection().toString());
		tags.show(newhtml, textarea.value);
	}
);


// Кнопка для открытия окна
const openWindow = document.getElementById("openWindow");

// Кнопка для принятия изображения
const acceptImage = document.getElementById("acceptImage");

// Само модальное окно
const modal = document.getElementById("modal");

// Массив с input:radio
const radio = document.querySelectorAll("[id^='radio']");

// Кнопка для закрытия окна
const closeWindow = document.getElementById("closeWindow");


// Инцилизация значения
var value;

// Добавление к каждому input:radio действие
radio.forEach(elem => {
    elem.addEventListener("click", function () {

        value = elem.value;
        if (value !== undefined) {
			textarea.value += `<img src='${value}' width='200px' height='200px'>`;
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
})

// Просто закрытия окна
closeWindow.addEventListener("click", () => {
    modal.classList.toggle("hidden");
})