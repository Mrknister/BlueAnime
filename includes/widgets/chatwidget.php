
<div id="chatwidget">
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/chat.php');
$chat = new Chat;
$chat->load_messages();
foreach($chat->chatmessages as $message) 
{
?>

<div class="chatmessage">
        <?php echo $message->Message;
    if($message->Edited)
    {
        #hier muss irgendwas gemacht werden, für den fall, dass es editiert wurde
    } ?>    
    <div class="newsdate"><?php
    echo $message->CreationDate; // das sollte mit css kleiner gemacht werden 
    ?></div>

</div>

<?php
}
?>

</div>
