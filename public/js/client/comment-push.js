$(document).ready(function () {
    var channel = $('channel').text();

    Pusher.logToConsole = true;

    var comment = new Pusher('bafb5beb21f5300fc328', {
        cluster: 'ap1',
        encrypted: true
    });

    var comment_channel = comment.subscribe('comment-channel' + channel);
    comment_channel.bind('App\\Events\\CommentEvent', function (data) {
        var element = `<a class="notify_link" href="${data['link']}">${data['message']}</a>`;
        $('.notify').append(element);
        $('.count_notify').text(parseInt($('.count_notify').text()) + 1);
        setTimeout(function () {
            $('.notify_link').remove();
        }, 20000);
    });
});
