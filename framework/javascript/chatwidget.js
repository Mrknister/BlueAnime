function loadChatMessages()
{
    $("#chatlog").load("/framework/php/widgets/chatwidget_log.php");

    setTimeout('loadChatMessages()',700);
    
}

$(document).ready(function()
{
    loadChatMessages();
    
    
    $("#chatinput").keypress(function(e) 
    {
        if(e.which == 13) 
        {
            $.post("/framework/php/widgets/chatwidget_send.php", { message: $("#chatinput").val()}).done(function(data) 
            {
            
                    var datatrimmed = $.trim(data) ;
                    if( datatrimmed != "success")
                    {
                        alert(datatrimmed);
                    }
            });
            $("#chatinput").val('');
        }
    });
    $("#chatinput").keyup(function(e)
    {
        if(e.which == 13) 
        {
            $("#chatinput").val('');
        }
    });
    setTimeout('$("#chatlog").scrollTop($("#chatlog")[0].scrollHeight)',800);
});


