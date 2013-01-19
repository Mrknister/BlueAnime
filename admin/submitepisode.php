<?php
require_once('../includes/mysqlconfig.php');
require_once('onlyadminallowed.php');

function episode_exists($serie,$episode)
{

    $mysqli = connect_with_episodereader();
    
    $query ="Select * from Folgen where SerienId=$serie and Folge=$episode";
    $queryresult = $mysqli->query($query);
    
    $mysqli->close();
    if( $queryresult->num_rows == 0 )
        return false;
        
    return true;
}








if(!isset($_GET['serie']))
{
    die('Der serienparameter muss gesetzt sein');
}
if(!isset($_GET['episode']))
{
    die('Der Episodenparameter muss gesetzt sein');
}
if(!isset($_GET['title']))
{
    die('Der Titelparameter muss gesetzt sein');
}
if(!isset($_GET['path']))
{
    die('Der Pfadparameter muss gesetzt sein');
}
if(!is_numeric($_GET['serie']))
{
    die('Der Serienparameter ist ungültig');
}
if(!is_numeric($_GET['episode']))
{
    die('Der Episodenparameter ist ungültig');
}

/*
$mysqli = mysqli_connect("127.0.0.1", "EpisodeWriter", "gMwLZyxvETDOCm8U", "BlueAnime");
if ($mysqli->errno)
{
    die( "Failed to connect to MySQL: " . $mysqli->error);
}
*/
$serie = $_GET['serie'];
$episode = $_GET['episode'];
$title = $_GET['title'];
$path = $_GET['path'];

if(episode_exists(1,1))
{
    //redirect the user to the need to edit site
    die('This episode allready exists.');
}

$mysqli = connect_with_episodewriter();
$title = $mysqli->escape_string($title);
$path = $mysqli->escape_string($path);
$query = "INSERT into Folgen (SerienId,Folge,Titel,Dateipfad) values ($serie ,$episode , '$title' , '$path' )";
if($mysqli->real_query($query))
{
    echo "Episode erfolgreich eingefügt";
}
else 
{
    die("Fehler!".$query);
} 

?>
