const menuActivation = document.querySelector('.menu__activation');
const menu = document.querySelector('.menu');

if (menuActivation && menu) {
    menuActivation.addEventListener('click', () => {
        menu.classList.toggle('menu__active');
    });
}
