<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/mysqlconfig.php';
$securimage = new Securimage();

function check_username($username)
{
    $mysqli = connect_with_userreader();
    $username = $mysqli->real_escape_string($username);
    
    $query = "select * from Users,Verificationqueue where Users.Name = '$username' or Verificationqueue.UserName ='$username'";
    $result=$mysqli->query($query);
    $mysqli->close();
    if ( $result->num_rows != 0 )
    {
        die('Der Benutzername existiert bereits.');
    }
    
    
}

function check_mail($email)
{
    $mysqli = connect_with_userreader();

    $email = $mysqli->real_escape_string( $email );
    

    $query = "select * from Users,Verificationqueue where Users.email = '$email' or Verificationqueue.email ='$email'";
    $result=$mysqli->query($query);
    $mysqli->close();
    if ( $result->num_rows != 0 )
    {
        die('Die e-mail wird bereits verwendet.');
    }
    
}

function perform_checks($username,$email) 
{
    check_username($username);
    check_mail($email);
}
if ($securimage->check($_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue

  // or you can use the following code if there is no validation or you do not know how
  echo "The security code entered was incorrect.<br /><br />";
  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
  exit;
}


if(!isset($_POST['username']))
{
    die('no username specified');
}
if(!isset($_POST['password']))
{
    die('no password specified');
}
if(!isset($_POST['email']))
{
    die('no email specified');
}
if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['email'])) 
{
    die( 'Die e-mail ist nicht gültig.' );
}
if( !preg_match( '/^[a-zA-Z0-9_äöüÄÖÜêôîéè]{3,12}/',$_POST['username']  ) )
{
    die( 'Der Nutzername muss 3-12 Buchstaben beinhalten und darf nur Buchstaben und Zahlen beinhalten.' );
}

perform_checks($_POST['username'],$_POST['email']);

$mysqli = connect_with_queuewriter();

$username = $mysqli->real_escape_string($_POST['username']);
$password = md5($_POST['password']);
$email= $mysqli->real_escape_string($_POST['email']);

$actkey = rand(1000000000,9999999999);


$query = "insert into Verificationqueue (UserName,Password,email,ActivationKey) values ( '$username', '$password','$email', $actkey ) ";

if(!$mysqli->real_query($query))
    die('Unknown Error! Arrgh what happened!!!'.$mysqli->error);

?>
<!-- Hier ist wunderschöner html code ( nur unsichtbar ) -->
<?php
echo 'Your activationkey is '.$actkey;
?>



























