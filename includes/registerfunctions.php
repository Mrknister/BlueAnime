<?php
function register($username,$password,$email,$userlevel=1)
{
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/error.php');
    if(!check_username($username))
    {
        return -1;
    }
    if(!check_mail($email))
    {
        return -2;
    }
    if(!is_numeric($userlevel))
    {
        private_log_error("The userlevel is not numeric! The specified username was '$username', the specified password was '$password', the specified email was '$email' the specified userlevel was $userlevel");
        return -3;
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    $password = md5($password);
    $query = "insert into Users (Name,Password,email,Userlevel) values ('$username','$password','$email',$userlevel)";
    $mysqli = connect_with_userwriter();
    if(!$mysqli->real_query($query))
    {
        handle_mysql_error($mysqli,$query);
        return -4;
        
    }
    return 0;
    
    
}

function check_username($username)
{
    if(!preg_match( '/^[a-zA-Z0-9 -_]{3,12}$/',$username))
    {
        return false;
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/error.php');
    
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
function check_mail($email)
{
    if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email))
    {
        return false;
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    $mysqli = connect_with_userreader();

    $email = $mysqli->real_escape_string( $email );
    

    $query = "select * from Users where email = '$email'";
    $result=$mysqli->query($query);
    $mysqli->close();
    if ( $result->num_rows != 0 )
    {
        return false;
    }
    return true;
}
?>