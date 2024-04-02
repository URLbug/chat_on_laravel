$(document).ready(function(){
    window.onload = function()
    {
        document.getElementById('chat-messages').scrollTop = 9999;
    }

    $('#chat-form').on('submit',function(event){
        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            async: true,
            url: '/',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            contentType: false,
            data: formData,
            cache : false,
            processData: false,
            success:function(response){
                $('#text').val('');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("some error");
            },
        });
    });

    setInterval(function(){
        $.get(
            '/all',
            null,
            function(data){
                $('#chat-messages').html(data);
            }
        );
    }, 2000);
})
