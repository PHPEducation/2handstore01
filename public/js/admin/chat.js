function scrollBottom()
{
    var msg_box = $('.msg_history');
    msg_box[0].scrollTop = msg_box[0].scrollHeight;
}
function setTo(to)
{
    $('.msg_send_btn').attr('data-id', to);
}

$(document).on('click', '.chat_list', function () {
    $('.chat_list').removeClass('active_chat');
    $(this).addClass('active_chat');
    $(this).find('p').removeClass('font-weight-bold text-danger');
    var from = $(this).attr('data-from');
    setTo(from);
    var url = $(this).parents('.inbox_chat').attr('data-url');
    $.ajax({
        method: 'POST',
        url: url,
        data: {from: from},
        success: function (result) {
            $('.msg_history').html(result);
            scrollBottom();
        }
    });
});

$(document).ready(function () {
    scrollBottom();
    window.Echo.private('user.' + $('.write_msg').attr('data-id'))
        .listen('MessagePosted', function (data) {
            if(data.message.from == $('.msg_send_btn').attr('data-id')) {
                $('.msg_history').append(`<div class="incoming_msg">
                                            <div class="incoming_msg_img"> <img src="${data.avatar}" alt="avatar"> </div>
                                            <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p class="msg_content">${ data.message.message }</p>
                                                <span class="time_date">${ data.message.created_at }</span></div>
                                            </div>
                                        </div>`);
            }
            
            var chat_list = $('.chat_list[data-from=' + data.message.from + ']');
            if (chat_list.length < 1) {
                var prepend = `<div class="chat_list" data-from="${data.message.from}">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img src="${data.avatar}" alt="avatar"> </div>
                                        <div class="chat_ib">
                                            <h5>${data.message.user.name}<span class="from-email">${data.message.user.email}</span></h5>
                                            <p class="font-weight-bold text-danger">${data.message.message}</p> 
                                            <h5><span class="chat_date">${data.message.created_at}</span></h5>
                                        </div>
                                    </div>
                                </div>`
                $('.inbox_chat').prepend(prepend);
            } else { 
                $('.chat_list[data-from=' + data.message.from + ']')
                    .find('p')
                    .text(data.message.message)
                    .attr('data-id', data.message.id)
                    .addClass('font-weight-bold text-danger')
                    .find('.from-email').text(data.message.user.email)
                    .find('chat_dat').text(data.message.created_at);
                // $('.chat_list[data-from=' + data.message.from + ']')

                $('.inbox_chat').prepend($('.chat_list[data-from=' + data.message.from + ']'));
            }
            scrollBottom();
        });

    $(document).on('keypress', '.write_msg', function (event) {
        if (event.which == 13) {
            sendMessage($(this));
        }
    }) 
});

function appendMessage(content)
{
    var append = `<div class="outgoing_msg">
                    <div class="sent_msg">
                    <p class="msg_content">${content}</p>
                </div>`;
    $('.msg_history').append(append);
    scrollBottom();
}

function sendMessage()
{
    var element = $('.write_msg');
    var message = $('.write_msg').val();
    if (message.length < 1) return;
    $('.write_msg').val('')
    appendMessage(message);
    var url = element.attr('data-url');
    var from = element.attr('data-id');
    var to = element.siblings('button').attr('data-id')
    $.ajax({
        method: 'post',
        url: url,
        data: {from: from, to: to, message: message},
        success: function (result) {
        }
    });
}

$(document).on('input', '.search-bar', function () {
    var search = $(this).val();
    if (search.length < 2) {
        $('.search-result').html('');
        return;
    };
    $.ajax({
        method: 'get',
        url: $(this).attr('data-url'),
        data: {search: search},
        success: function (result) {
            $('.search-result').html(result);
        }
    });
});

$(document).on('click', '.user-result', function (event) {
    event.preventDefault();
    const element = $(this);
    var email = element.find('.search-email').text();
    var chat = $('.from-email:contains(' + email + ')');
    $('.chat_list').removeClass('active_chat');
    if (chat.length == 0) {
        var id = element.find('.search-email').attr('data-id');
        var name = element.find('.search-name').text();
        var img = element.find('.chat_img img').attr('src');
        var prepend = `<div class="chat_list" data-from="${id}">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="${img}" alt="avatar"> </div>
                                <div class="chat_ib">
                                    <h5>${name}<span class="from-email">${email}</span></h5>
                                    <p class="font-weight-bold text-danger"></p> 
                                    <h5><span class="chat_date"></span></h5>
                                </div>
                            </div>
                        </div>`;
        $('.inbox_chat').prepend(prepend);
    }
    else{
        chat.parents('.chat_list').addClass('active_chat');
        $('.inbox_chat').prepend(chat.parents('.chat_list'));
    }
    $('.user-result').html('');
})
