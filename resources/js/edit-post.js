import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min.js';

document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.edit-post');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            console.log('edit post');
            const url = removeDoubleSlashes(window.location.origin + '/post' + '/' + button.getAttribute('data-id'));
            const xhr = new XMLHttpRequest();
            xhr.open('GET', url);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const responseData = JSON.parse(xhr.responseText);
                    const modalContainer = document.querySelector('#editModal');
                    const myModal = new bootstrap.Modal(document.getElementById('editModal'));
                    myModal.show();

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
            'X-CSRF-TOKEN': document.
            querySelector('meta[name="csrf-token"]').
            getAttribute('content')
        }
    })
        .then(response => response.json())
        .then(data => {
            updateLikesCount(postId, data.likecount);
            updateLikeButton(postId, true);
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
            updateLikesCount(postId, data.likecount);
            updateLikeButton(postId, false);
        })
        .catch(error => {
            console.error(error);
        });
}

function updateLikesCount(postId, likesCount) {

    const likeButtonLikesCount = document.querySelector('.like-button[data-post-id="' + postId + '"] #likesCount_' + postId);
    const unlikeButtonLikesCount = document.querySelector('.unlike-button[data-post-id="' + postId + '"] #likesCount_' + postId);
    if (likeButtonLikesCount && unlikeButtonLikesCount) {
        likeButtonLikesCount.textContent = likesCount;
        unlikeButtonLikesCount.textContent = likesCount;
    }
}

function updateLikeButton(postId, isLiked) {
    const likeButton = document.querySelector('.like-button[data-post-id="' + postId + '"]');
    const unlikeButton = document.querySelector('.unlike-button[data-post-id="' + postId + '"]');

    if (likeButton && unlikeButton) {
        likeButton.classList.toggle('d-none', isLiked);
        unlikeButton.classList.toggle('d-none', !isLiked);
    }
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

