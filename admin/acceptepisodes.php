<?php
require_once('../includes/mysqlconfig.php');
require_once('../includes/userfunctions.php');
session_start();

require_once('onlyadminallowed.php');


if(!isset($_GET['serie']))
{
	die("Ich brauche eine seriennummer");
}
if(!is_numeric($_GET['serie']))
{
	die('Ich brauche eine Zahl als Seriennummer.');
}



function episode_exists($serie,$episode)
{

    $mysqli = connect_with_episodereader();
    
    $query ="Select * from Folgen where SerienId = $serie and Folge = $episode";
    $queryresult = $mysqli->query($query);
    
    $mysqli->close();
    if( $queryresult->num_rows == 0 )
        return false;
        
    return true;
}



function add_episode($sid,$enumber,$title,$path)
{
	if(episode_exists($sid,$enumber))
		return "Die Folge $enumber ( \"$title\" ) konnte nicht eingetragen werden, da bereits eine Folge mit dieser Episodennummer existiert.<br ?>";
	
	$mysqli = connect_with_episodewriter();
	$title = $mysqli->escape_string($title);
	$path = $mysqli->escape_string($path);
	$query = "INSERT into Folgen (SerienId,Folge,Titel,Dateipfad) values ($sid ,$enumber , '$title' , '$path' )";
	if($mysqli->real_query($query))
	{
	    //echo "Episode erfolgreich eingefügt";
	}
	else 
	{
		return "Mysql interner Fehler bei episode $enumber";
	}
	return "";
}



$count = 1;
$Fehlernachricht ='';


while(isset($_GET['path'.$count]) && isset($_GET['title'.$count]) && isset($_GET['enumber'.$count])) 
{
	$Fehlernachricht =$Fehlernachricht.add_episode($_GET['serie'],$_GET['enumber'.$count],$_GET['title'.$count],$_GET['path'.$count]);
	
	$count+=1;
}
echo $Fehlernachricht;


?>