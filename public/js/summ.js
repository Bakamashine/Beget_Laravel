const slag = document.querySelectorAll('[id^="slag"]');
const sum = document.querySelector('#sum');


let count = 0;
slag.forEach(element => {
    count += parseInt(element.textContent)
});

sum.textContent = count + " рублей";