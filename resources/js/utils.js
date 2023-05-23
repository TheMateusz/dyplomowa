const closeButton = document.querySelector('.alert .close');
const alertElement = document.querySelector('.alert');

if (closeButton) {
    closeButton.addEventListener('click', function() {
        alertElement.style.display = 'none';
    });
}
