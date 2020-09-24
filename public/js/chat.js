$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#chat_in").datepicker({
        onSelect: function(first) {
            var last = $('#chat_out').val();
            if (first != "" && first != null && last != "" && last != null && receiver_id != '') {
                $.ajax({
                    url:"/lk-chat/date/" + first + "/" + last + "/" + receiver_id,
                    type:"GET",
                    data: '',
                    cache: false,
                    success: function(data){
                        $('.chat__right .chat__messages').html(data);
                    }
                });
            }
        }
    });

    $("#chat_out").datepicker({
        onSelect: function(last) {
            var first = $('#chat_in').val();
            if (first != "" && first != null && last != "" && last != null && receiver_id != '') {
                $.ajax({
                    url:"/lk-chat/date/" + first + "/" + last + "/" + receiver_id,
                    type:"GET",
                    data: '',
                    cache: false,
                    success: function(data){
                        $('.chat__right .chat__messages').html(data);
                    }
                });
            }
        }
    });

    $('.chat__chats .chat__chat').click(function () {
        $('.chat__chat').removeClass('chat__chat--active');
        $(this).addClass('chat__chat--active');
        $(this).removeClass('chat__chat--curner');
        $('.chat__form').removeClass('not-select');

        $('.chat__form').addClass('active');

        $('#chat_out').val('');
        $('#chat_in').val('');

        Scroll_chat();

        receiver_id = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: '/lk-chat/' + receiver_id,
            data: '',
            cache: false,
            success: function (data) {
                $('.chat__right .chat__messages').html(data);
            }
        })
    });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('bd9c99ccc12f92e17ea4', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('view-message', function(data) {
        if (my_id === parseInt(data.to) && parseInt(receiver_id) === data.from) {
            $.ajax({
                type: 'get',
                url: '/lk-chat/' + receiver_id,
                data: '',
                cache: false,
                success: function (data) {
                    $('.chat__right .chat__messages').html(data);
                }
            })
        }
        if (data.counter > 0) {
            $('.lk-menu__link--message.lk-menu__link--active div div').html('<span id="count_chat">'+data.counter+'</span>');
        }
        else {
            $('#count_chat').remove();
        }
    });
    channel.bind('my-event', function(data) {
        if (my_id === data.from) {
            $.ajax({
                type: 'get',
                url: '/lk-chat/' + receiver_id,
                data: '',
                cache: false,
                success: function (data) {
                    $('.chat__right .chat__messages').html(data);
                    Scroll_chat();
                }
            })
        } else if (my_id === parseInt(data.to)) {
            if (parseInt(receiver_id) === data.from) {
                $.ajax({
                    type: 'get',
                    url: '/lk-chat/' + receiver_id,
                    data: '',
                    cache: false,
                    success: function (data) {
                        $('.chat__right .chat__messages').html(data);
                        Scroll_chat();
                    }
                });
                $('#'+ data.from).find('p').html(data.message);
            }
            else {
                $('#'+ data.from).addClass('chat__chat--curner');
                $('#'+ data.from).find('p').html(data.message);

                console.log(data.counter);

                if (data.counter > 0) {
                    $('.lk-menu__link--message.lk-menu__link--active div div').html('<span id="count_chat">'+data.counter+'</span>');
                }
                else {
                    $('#count_chat').remove();
                }
            }
        }
    });

    $(document).on('keyup', '.chat__form textarea', function (e) {
        var message = $(this).val();

        if (e.keyCode == 13 && message != '' && receiver_id != '') {
            $(this).val('');

            $('#'+receiver_id).find('p').html(message);

            $.ajax({
                type: 'post',
                url: '/lk-chat/message',
                data: "receiver_id=" + receiver_id + "&message=" + message,
                cache: false,
                success: function (data) {

                }
            })
        }
    });

    $(document).on('click ', '.chat__form input', function (e) {
        var message = $('.chat__form textarea').val();

        if (message != '' && receiver_id != '') {

            $('#'+receiver_id).find('p').html(message);

            $.ajax({
                type: 'post',
                url: '/lk-chat/message',
                data: "receiver_id=" + receiver_id + "&message=" + message,
                cache: false,
                success: function (data) {

                }
            });

            $('.chat__form textarea').val('');
        }
    })
});

function Scroll_chat() {
    $('.chat__right .chat__messages').animate({ scrollTop: 9999 }, 'slow');
}
