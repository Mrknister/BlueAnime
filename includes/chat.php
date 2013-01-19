<?php

class ChatMessage 
{
    public $C_Id;
    public $U_Id;
    public $Message;
    public $CreationDate;
    public $Edited;
    public $Blocked;
    public function __construct($C_Id,$U_Id,$Message,$CreationDate,$Edited,$Blocked)
    {
        $this->C_Id = $C_Id;
        $this->U_Id = $U_Id;
        $this->Message= $Message;
        $this->CreationDate = $CreationDate;
        $this->Edited = $Edited;
        $this->Blocked = $Blocked;
    }
    public function editMessage($new_text)
    {
    }
    public function deleteMessage()
    {
    }
}



class Chat 
{
    public $chatmessages = null;
    public function load_messages($howmany = 5,$offset = 0)
    {
        if(!(is_numeric($howmany) && is_numeric($offset)))
        {
            return false;
        }
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
        $mysqli = connect_with_messagesreader();
        $query = "select C_Id,U_Id,Message,DATE_FORMAT(CreationDate,'%H:%i') as CreationDate,Edited,Blocked from ChatMessages order by CreationDate desc limit $offset, $howmany";
        $result = $mysqli->query($query);
        if($mysqli->errno)
        {
            echo $mysqli->error;
            $mysqli->close();
            return false;
        }
        $this->chatmessages = array();
        while($tmp = $result->fetch_array())
        {
            $this->chatmessages[] = new ChatMessage($tmp['C_Id'],$tmp['U_Id'],$tmp['Message'],$tmp['CreationDate'],$tmp['Edited'],$tmp['Blocked']);
        }
        return true;
    }
}



?>