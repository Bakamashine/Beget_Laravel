class Spoiler {
    
    /**
     * Конструктор класса Spoiler
     * @param {HTMLElement} spoiler
     */
    constructor(spoiler) {
        this.spoiler = spoiler;
        this.div_spoiler = spoiler.children.div_spoiler;
    }
    
    /**
     * Проверяет наличие селектора 
     * @param {HTMLElement} elem 
     * @param {String} selector 
     * @returns boolean
     */
     #checkSelector(elem, selector = "hidden") {
        let arr = elem.classList;
        for (let i =0; i < arr.length; i++) {
            if (arr[i] == selector) {
                return true;
            }
        }
        return false;
    }

    /**
     * Открывает слайдер
     * @param {HTMLElement} symbol 
     */
    show(symbol) {
        let hidden = "hidden";
            this.div_spoiler.classList.toggle("max-h-80");
        if (this.#checkSelector(this.div_spoiler)) {
            this.div_spoiler.classList.remove(hidden);                                    
            symbol.textContent = "-";
        }  else  {
            this.div_spoiler.classList.add(hidden);
            symbol.textContent = "+";
        }
    }
    
}

// const spoiler1 = document.getElementById("spoiler1");

/**
 * Создаёт новый спойлер
 * @param {HTMLElement} spoiler 
 */
function EventListener(spoiler) {
    spoiler.children.btn.addEventListener("click", function() {
        let elem = new Spoiler(
            spoiler
        );

        let plus = spoiler.children.btn.children.plus;
        elem.show(plus);
    });
}

const elements = document.querySelectorAll('[id^="spoiler"]');

elements.forEach(element => {
    EventListener(element);
})