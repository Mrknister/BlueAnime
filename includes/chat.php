<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/error.php');


class ChatMessage 
{
    public $C_Id;
    public $U_Id;
    public $U_Name;
    public $Message;
    public $CreationDate;
    public $Edited;
    public $Blocked;
    
    public function __construct($C_Id,$U_Id,$U_Name,$Message,$CreationDate,$Edited,$Blocked)
    {
        $this->C_Id = $C_Id;
        $this->U_Id = $U_Id;
        $this->U_Name = $U_Name;
        $this->Message= $Message;
        $this->CreationDate = $CreationDate;
        $this->Edited = $Edited;
        $this->Blocked = $Blocked;
    }
    
}



function loadChatMessages($howmany = 20)
{
    if(!is_numeric($howmany) )
    {
        return null;
    }
    include_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    $mysqli = connect_with_messagesreader();
    $query = "select cm.C_Id,cm.U_Id,Users.Name,cm.Message,DATE_FORMAT(cm.CreationDate,'%H:%i') as FormattedDate,Edited,Blocked from ChatMessages as cm,Users where Users.Id = cm.U_Id and cm.C_Id >= (select max(C_Id) from ChatMessages) - $howmany";
    $result = $mysqli->query($query);
    if(handle_mysql_error($mysqli,$query))
    {
        return null;
    }
    $chatmessages = array();
    while($tmp = $result->fetch_array())
    {
        $chatmessages[] = new ChatMessage($tmp['C_Id'],$tmp['U_Id'],$tmp['Name'],$tmp['Message'],$tmp['FormattedDate'],$tmp['Edited'],$tmp['Blocked']);
    }
    return $chatmessages;
}

function sendChatMessage($content)
{
    include_once($_SERVER['DOCUMENT_ROOT'].'/includes/user.php');
    $user = new User();
    if(!$user->is_logged_in() )
    {
        return -1;
    }
    if($user->is_banned_from_chat())
    {
        return -2;
    }
    
    include_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/includes/error.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/includes/bbcode.php');
    
    $content = htmlentities($content);
    $content = bbc2html($content);
    
    $mysqli = connect_with_messageswriter();
    $content = $mysqli->real_escape_string($content);
    $u_id = $user->get_id();
    $query = "insert into ChatMessages (U_Id,Message,CreationDate) values ($u_id,'$content',NOW())";
    $mysqli->real_query($query);
    if(handle_mysql_error($mysqli,$query))
    {
        return -3;
    }
    return 0;
    
}



?>




































