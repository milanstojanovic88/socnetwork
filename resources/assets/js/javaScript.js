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

});