<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/error.php');
class User
{
    private $user_id = 0;
    public $name;
    public $email;
    public $userlevel = 0;
    
    
    
    public function __construct()
    {
        if(session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }
        
        if(!isset($_SESSION['Id']))
        {
            return;
        }
        
        $this->user_id = $_SESSION['Id'];
        
        
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
    /*
    public function load_data()
    {
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
        
        
        if(!isset($this->user_id))
        {
            return;
        }
        $mysqli = connect_with_userreader();
        $query = 'SELECT Name,email,Userlevel from Users where Id='.$this->user_id;
        
        $queryresult = $mysqli->query($query);
        if( $queryresult->num_rows != 1 )
        {
            return;
        }
        $array = $queryresult->fetch_array();
        $this->name = $array['Name'];
        $this->email = $array['email'];
        $this->userlevel = $array['Userlevel'];
                
        
        $mysqli->close();
        $queryresult->free();
        
    }*/
    
    public function login($name,$password)
    {
        
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
        
        $mysqli = connect_with_userreader();
        $name = $mysqli->real_escape_string( $name );
                
        $password = md5($password);

        
        
        $query = "SELECT Id,Name,email,Userlevel from Users where Name = '$name' and Password = '$password'";
        
        $queryresult = $mysqli->query($query);
        if($mysqli->error)
        {
            
            echo $mysqli->error;
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
    public function is_admin()
    {
        if($userlevel>=100)
        {
            return true;
        }
        return false;
    }
    public function is_logged_in()
    {
        if($user_id == 0)
        {
            return false;
        }
        return true;
    }
}
function register($username,$email,$userlevel=1)
{
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    echo check_username($username);
    
}

function check_username($username)
{
    if(!preg_match( '/^[a-zA-Z0-9_äöüÄÖÜêôîéè]{3,12}$/',$username))
    {
        return false;
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    $mysqli = connect_with_userreader();
    $username = $mysqli->real_escape_string($username);
    
    $query = "select Id from Users where Name = '$username' ";
    $result=$mysqli->query($query);
    if(handle_mysql_error($mysqli,$query))
    {
        return false;
    }
    
    $mysqli->close();
    if ( $result->num_rows != 0 )
    {
        return false;
    }
    return true;
}

$c_user = new User;

?>