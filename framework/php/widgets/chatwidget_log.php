
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/chat.php');

foreach(loadChatMessages() as $message) 
{
?>

<div class="chatmessage">
        <?php echo '<u>'.$message->U_Name.':</u> '.$message->Message;
    if($message->Edited)
    {
        #hier muss irgendwas gemacht werden, für den fall, dass es editiert wurde
    } ?>    
    <div class="chatdate"><?php
    echo $message->CreationDate; // das sollte mit css kleiner gemacht werden 
    ?></div>

</div>

<?php
}
?>

