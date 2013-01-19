<?php
require_once("mysqlconfig.php");
function get_user_id()
{
    
}

function get_user_level()
{
    if(session_status()===PHP_SESSION_NONE)
    {
        session_start();
    }
    
    if(!isset($_SESSION['Id']))
    {
    	   return 0;
    }
    $userid = $_SESSION['Id'];
    
    $mysqli = connect_with_userreader();
    $query = "SELECT UserLevel from Users where Id=$userid";
    $queryresult = $mysqli->query($query);
    if( $queryresult->num_rows != 1 )
    {
        return 0;
    }
    return $queryresult->fetch_row()[0];
}

function is_admin($userid) 
{
	if ( get_user_level($userid) > 100 )
	{
		return true;
	}
}

?>
