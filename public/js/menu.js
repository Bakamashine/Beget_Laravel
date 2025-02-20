const btn_show = document.querySelector('#showMenu');
const admin_menu = document.querySelector('#admin-menu');
const close_menu = document.querySelector('#closeMenu');

btn_show.addEventListener('click', function () {
    admin_menu.classList.toggle('max-mobile:-translate-x-full');
    admin_menu.classList.toggle('max-mobile:translate-x-full');
})

close_menu.addEventListener('click', function () {
    admin_menu.classList.toggle('max-mobile:-translate-x-full');
})