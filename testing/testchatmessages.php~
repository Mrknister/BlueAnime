<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/chat.php');
$chat = new Chat;
$chat->load_messages();
foreach($chat->chatmessages as $message)
{
    echo $message->C_Id;
}


?>