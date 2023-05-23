document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.edit-post');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const url = removeDoubleSlashes(window.location.origin + '/post' + '/' + button.getAttribute('data-id'));
            const xhr = new XMLHttpRequest();
            console.log(url);
            xhr.open('GET', url);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const responseData = JSON.parse(xhr.responseText);
                    const modalContainer = document.querySelector('#editModal');
                    modalContainer.querySelector('#title').value = responseData.data.title;
                    modalContainer.querySelector('#content').value = responseData.data.content;
                    modalContainer.querySelector('#post-id').value = responseData.data.id;
                } else {
                    const responseData = JSON.parse(xhr.responseText);
                    Swal.fire('Oops...', responseData.message, responseData.status);
                }
            };
            xhr.send();
        });
    });
});

function likePost(postId) {
    fetch('/post/' + postId + '/like', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            window.location.reload();
        })
        .catch(error => {
            console.error(error);
        });
}

function unlikePost(postId) {
    fetch('/post/' + postId + '/unlike', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            window.location.reload();
        })
        .catch(error => {
            console.error(error);
        });
}

document.querySelectorAll('.like-button').forEach(button => {
    button.addEventListener('click', () => {
        const postId = button.getAttribute('data-post-id');
        likePost(postId);
    });
});

document.querySelectorAll('.unlike-button').forEach(button => {
    button.addEventListener('click', () => {
        const postId = button.getAttribute('data-post-id');
        unlikePost(postId);
    });
});

function removeDoubleSlashes(url) {
    return url.replace(/([^:]\/)\/+/g, '$1');
}

