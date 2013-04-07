<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/chat.php';
if(!isset($_POST['message']))
{
    die('error: no message specified');
}
$message = trim( $_POST['message'] );
if($message === '')
{
    die('success');
}
$errorcode =sendChatMessage($message);
if($errorcode === 0)
{
    echo 'success';
}
else if($errorcode === -1)
{
    echo 'Bitte logge dich ein um zu chatten';
}
else if($errorcode === -2)
{
    echo 'Du bist momentan gebannt';
}
else// if($errorcode === -3)
{
    echo 'Es ist ein interner Fehler aufgetreten';
}
?>