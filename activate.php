<?php

require_once('includes/mysqlconfig.php');

if( !isset($_GET['acid']))
{
    die( 'acid ist nicht gesetzt' );
}
if( !isset($_GET['key']))
{
    die( 'der key ist nicht gesetzt' );
}

$acid = $_GET['acid'];
$key = $_GET['key'];
if( !is_numeric($acid))
{
    die('Ich will eine Nummer du spast');
}
if( !is_numeric($key))
{
    die('Ich will eine Nummer du spast');
}
$mysqli = connect_with_queuereader();

$query = "select  UserName,Password,email from Verificationqueue where Id=$acid and ActivationKey=$key";
$result = $mysqli->query($query);

if( $result->num_rows !== 1 )
{
    die('Fehler. Bist du schon aktiviert?');
}
$mysqli->close();


$mysqli = connect_with_userwriter();
$row = $result->fetch_row();
$username = $mysqli->real_escape_string($row[0]);
$password = $row[1];
$email = $mysqli->real_escape_string($row[2]);
$query = "insert into Users (Name,Password,UserLevel,email) values ('$username','$password',1,'$email')";
if( !$mysqli->real_query($query))
{
    die($mysqli->error); 
}

$mysqli->close();
$mysqli = connect_with_queuewriter();
$query = 'delete from Verificationqueue where Id = '.$acid;
if( !$mysqli->real_query($query))
{
    die($mysqli->error); 
}
$mysqli->close();
?>







































