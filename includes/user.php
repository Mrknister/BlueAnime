<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/error.php');
class User
{
    private $user_id = 0;
    private $name;
    private $email;
    private $userlevel = 0;
    
    
    
    public function __construct()
    {
        if(session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }
        
        if(isset($_SESSION['User']))
        {
            $this->user_id = $_SESSION['User']->user_id;
            $this->name = $_SESSION['User']->name;
            $this->email = $_SESSION['User']->email;
            $this->userlevel = $_SESSION['User']->userlevel;
        }
        else 
        {
            return;
        }
    }

    public function login($name,$password)
    {
        
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
        
        $mysqli = connect_with_userreader();
        $name = $mysqli->real_escape_string( $name );
                
        $password = md5($password);

        
        
        $query = "SELECT Id,Name,email,Userlevel from Users where Name = '$name' and Password = '$password'";
        
        $queryresult = $mysqli->query($query);
        if(handle_mysql_error($mysqli,$query))
        {
            return false;
        }
        if( $queryresult->num_rows != 1 )
        {
            
            return false;
        }
        
        $array = $queryresult->fetch_array();
        
        $this->user_id = $array['Id'];
        $this->name = $array['Name'];
        $this->email = $array['email'];
        $this->userlevel = $array['Userlevel'];
        if(session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }
        $_SESSION['Id'] = $this->user_id;
        $_SESSION['User'] = $this;
        
        $mysqli->close();
        $queryresult->free();
        return true;
    }
    public function get_id()
    {
        return $this->user_id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function is_admin()
    {
        if($this->userlevel>=100)
        {
            return true;
        }
        return false;
    }
    public function is_logged_in()
    {
        if($this->user_id == 0)
        {
            return false;
        }
        return true;
    }
    public function is_banned_from_chat()
    {
        return false;//someday here will be something interesting
    }
}


?>