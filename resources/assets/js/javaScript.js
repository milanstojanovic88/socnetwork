$(document).ready(function () {

    $('.chat-button.chat-expand').on('click',function () {

        var button = document.getElementsByClassName('chat-expand')[0],
            chatWindow = button.parentNode.previousElementSibling,
            dataExpand = button.dataset.expand;

        if(dataExpand == 'expanded') {
          
            button.dataset.expand = '';
            $(chatWindow).removeClass('chat-window-expanded').addClass('chat-window-retracted');
            button.innerHTML = "Show";
            
        } else {

            button.dataset.expand = 'expanded';
            $(chatWindow).removeClass('chat-window-retracted').addClass('chat-window-expanded');
            button.innerHTML = "Hide";
        }
    });

    updateUserStatus();

});

function updateUserStatus() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: checkIfLoggedURL,
        type: 'POST'
    })
        .done(function(msg){
            for(var i = 0; i < msg.length; i++) {

                var user_id = msg[i].user_id;

                if(msg[i].logged_in) {
                    $('.users-list-container ul li a span[data-userid="' + user_id + '"]')
                        .removeClass('disconnected')
                        .addClass('connected');
                } else {
                    $('.users-list-container ul li a span[data-userid="' + user_id + '"]')
                        .removeClass('connected')
                        .addClass('disconnected');
                }
            }
    });

    setTimeout(updateUserStatus, 30000);
}

