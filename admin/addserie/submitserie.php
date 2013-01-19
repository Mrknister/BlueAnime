<?php
require_once('onlyadminallowed.php');
require_once('serroroccured.php');
function get_genre_query()
{
   
   $query = "select count(*) from Genres"; 
   $mysqli = connect_with_animereader();
   if(!$result = $mysqli->query($query))
		   error_adding("Ein interner Fehler ist aufgetreten");
   $numrows = (int) $result->fetch_row()[0];
   
   $count=1;
   $onegenre=false;
   $query = "insert into SerieInGenre (S_ID,G_ID) values ";
   while($count <= $numrows)  
   {
   	if( isset($_POST['genre'.$count])) 
   	{
   		if(!is_numeric($_POST['genre'.$count]))
   		{
   			error_adding('Das genre muss eine Zahl sein.');
			}
			$genre = $_POST['genre'.$count];
			$onegenre=true;
			$query = $query."( placeholder , $genre ),";
   	}
		$count +=1;
	}
	if(!$onegenre)
	{
		error_adding('Ich brauche mindestens ein Genre.');
	}
	$query=substr_replace($query," " ,-1);
	return $query;
}

function insertSerieIntoTable($animename,$userlevel,$foldername,$shortdescription,$bildname,$jahr,$genrequery)
{
    if(! is_numeric($userlevel) )
        error_adding('Ungültiges Userlevel');
    $mysqli = connect_with_animewriter();
    if ($mysqli->errno)
    {
        error_adding( "Failed to connect to MySQL: " . $mysqli->error);
    }
    
    $escaped_animename = $mysqli->real_escape_string($animename);
    $escaped_foldername = $mysqli->real_escape_string($foldername);
    $escaped_shortdescription = $mysqli->real_escape_string($shortdescription);
    $jahr = $mysqli->real_escape_string($jahr);
    $bildname = $mysqli->real_escape_string($bildname);
    
    $query = "insert into Serien (Serienname,Userlevel,Ordnername,Kurzbeschreibung,Bildname,Jahr) 
    values ( '$escaped_animename',$userlevel,'$escaped_foldername','$escaped_shortdescription','$bildname','$jahr')";
    #echo $query;
    
    if(!$mysqli->real_query($query))
    {
        echo $mysqli->error;
        error_adding('Ein unerwarteter Fehler ist aufgetreten');
    }
    $genrequery=str_replace('placeholder', $mysqli->insert_id, $genrequery);
    if(!$mysqli->real_query($genrequery))
    {
        echo $mysqli->error;
        error_adding('Ein unerwarteter Fehler ist aufgetreten');
    }

}


?>


<?php

include($_SERVER[ 'DOCUMENT_ROOT' ].'/includes/checkserie.php');
include($_SERVER[ 'DOCUMENT_ROOT' ].'/includes/forumcode.php');


if( ! isset($_POST['animename'] ))
{
    error_adding('Die Serie muss einen Namen haben!');
}
if( ! isset($_POST['foldername'] ))
{
    error_adding('Gib bitte einen Ordnernamen an.');
}
if( preg_match('/^[a-z\-\d]{2,12}$/i',$_POST['foldername'])!== 1)
{
    error_adding('Der Ordnername darf nur Zahlen Buchstaben und Bindestriche enthalten. ( Auch keine Umlaute )');
} 
if( ! isset($_POST['shortdescription'] ))
{
    error_adding('Eine Kurzbeschreibung sollte vorhanden sein!');
}
if( ! isset($_POST['longdescription'] ))
{
    error_adding('Eine ausführliche Beschreibung wäre nett!');
}

if( ! isset($_POST['userlevel'] ))
{
    $userlevel=0;
}
else 
{
    $userlevel=$_POST['userlevel'];
}
if(! isset($_POST['jahr']))
{
	$jahr='';
}
else 
{
	$jahr=$_POST['jahr'];
}

$animename = htmlspecialchars($_POST['animename']);
$foldername = $_POST['foldername'];
$shortdescription = $_POST['shortdescription'];
$longdescription = $_POST['longdescription'];
$genrequery=get_genre_query();




$result = checkSerie($animename,$foldername);
if($result == -1)
{
    error_adding('Eine Serie, mit diesem namen existiert schon.');
}
if($result == -2 )
{
    error_adding('Ein Ordner, mit diesem Namen existiert schon');
}
if(file_exists( $_SERVER[ 'DOCUMENT_ROOT' ]."/serien/$foldername") )
{
	   error_adding('Ein ordner mit diesem Namen existiert bereits.');
}
if(!mkdir( $_SERVER[ 'DOCUMENT_ROOT' ]."/serien/$foldername",0777))
{
    error_adding('Der Ordner konnte nicht erstellt werden.');
}

if(file_put_contents($_SERVER[ 'DOCUMENT_ROOT' ]."/serien/$foldername/description.include",translateForumCode($longdescription))===FALSE)
{
	   rmdir($_SERVER[ 'DOCUMENT_ROOT' ]."/serien/$foldername");
    error_adding('Die Beschreibung konnte nicht gespeichert werden. Dieser Fehler ist sehr seltsam');
}
require_once('upload.php');

$bildname = save_uploaded_file('bild',$_SERVER[ 'DOCUMENT_ROOT' ]."/serien/$foldername/");
if(stripos($bildname, 'Error:')===0)
{
		 error_adding($bildname);
}
insertSerieIntoTable($animename,$userlevel,$foldername,$shortdescription,$bildname,$jahr,$genrequery);
?>


<html>
<body>
Die Serie wurde erfolgreich eingetragen.
<a href="addserie.php" >Zurück</a>

</body>
</html>


























