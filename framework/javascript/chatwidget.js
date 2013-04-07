function loadChatMessages()
{
    
    $("#chatlog").load("/framework/php/widgets/chatwidget_log.php");
    
    setTimeout('loadChatMessages()',700);
}

$(document).ready(function()
{
    loadChatMessages()
    $("#chatinput").keypress(function(e) 
    {
        if(e.which == 13) 
        {
            $.post("/framework/php/widgets/chatwidget_send.php", { message: $("textarea#chatinput").val()}).done(function(data) 
            {
            
                    var datatrimmed = $.trim(data) ;
                    if( datatrimmed != "success")
                    {
                        alert(datatrimmed);
                    }
            });
            $("textarea#chatinput").val('');
        }
    });

});


