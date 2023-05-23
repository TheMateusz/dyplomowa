document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            Swal.fire({
                title: 'Czy na pewno chcesz usunąć rekord?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Tak',
                cancelButtonText: 'Nie'
            }).then(function(result) {
                if (result.value) {
                    const url = removeDoubleSlashes(window.location.origin + '/post' + '/' + button.getAttribute('data-id'));
                    const xhr = new XMLHttpRequest();
                    console.log(url);
                    xhr.open('DELETE', url);
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            window.location.reload();
                        } else {
                            const data = JSON.parse(xhr.responseText);
                            Swal.fire('Oops...', data.message, data.status);
                        }
                    };
                    xhr.send();
                }
            });
        });
    });
});

function removeDoubleSlashes(url) {
    return url.replace(/([^:]\/)\/+/g, '$1');
}
