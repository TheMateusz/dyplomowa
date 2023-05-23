document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.interests__section__input');
    let checkedCount = 0;

    checkboxes.forEach(checkbox => {
        if(checkbox.checked) {
            checkedCount++;
            checkbox.parentElement.classList.add('selected');
        }
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                console.log('checked');
                if (checkedCount < 10) {
                    checkedCount++;
                    this.parentElement.classList.add('selected');
                } else {
                    this.checked = false;
                    Swal.fire('Oops...', 'Możesz wybrać maksymalnie 10 zainteresowań', 'error');
                }
            } else {
                console.log('unchecked');
                checkedCount--;
                this.parentElement.classList.remove('selected');
            }
        });
    });
});
