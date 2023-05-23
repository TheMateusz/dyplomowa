const languageActivation = document.querySelector('.language__activation');
const language = document.querySelector('.language');

if (languageActivation && language) {
    languageActivation.addEventListener('click', () => {
        language.classList.toggle('language__active');
    });
}
