var receiver_id = '';
var my_id = document.querySelector('meta[name="user-id"]').getAttribute('content');;
$(document).ready(function () {
    // ajax setup form csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;
    var pusher = new Pusher('5c438a345e4c4df22136', {
        cluster: 'eu'
    });
    var channelName = "<?php echo 'notify-channel' ?>";
    //var channelName =  'notify-channel';
    var status = $('#id').val();
    var channel = pusher.subscribe('notify-channel');
    console.log(channel);
    channel.bind('App\\Events\\Notify', function(data) {
        if (my_id == data.from) {
            $('#' + data.to).click();
        } else if (my_id == data.to) {
            if (receiver_id == data.from) {
                $('#' + data.from).click();
            } else {
                var pending = parseInt($('#' + data.from).find('.pending').html());

                if (pending) {
                    $('#' + data.from).find('.pending').html(pending + 1);
                } else {
                    $('#' + data.from).append('<span class="pending">1</span>');
                }
            }
        }
    });

    $('.user').click(function () {
        $('.user').removeClass('active');
        $(this).addClass('active');
        $(this).find('.pending').remove();

        receiver_id = $(this).attr('id');
        $.ajax({
            type: "get",
            url: "message/" + receiver_id, // need to create this route
            data: "",
            cache: false,
            success: function (data) {
                console.log(data);
                $('#messages').html(data);
                scrollToBottomFunc();
            }
        });
    });

    $(document).on('keyup', '.panel__chat__container__input input', function (e) {
        var message = $(this).val();

        // check if enter key is pressed and message is not null also receiver is selected
        if (e.keyCode == 13 && message != '' && receiver_id != '') {
            $(this).val(''); // while pressed enter text box will be empty

            var datastr = "receiver_id=" + receiver_id + "&message=" + message;
            $.ajax({
                type: "post",
                url: "message", // need to create this post route
                data: datastr,
                cache: false,
                success: function (data) {

                },
                error: function (jqXHR, status, err) {
                },
                complete: function () {
                    scrollToBottomFunc();
                }
            })
        }
    });
});

// make a function to scroll down auto
function scrollToBottomFunc() {
    $('.panel__chat__container__wrapper').animate({
        scrollTop: $('.panel__chat__container__wrapper').get(0).scrollHeight
    }, 50);
}
