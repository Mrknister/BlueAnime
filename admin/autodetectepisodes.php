<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');

if(!isset($_GET['folder']))
{
    die('Es fehlt der Ordnerparameter.' );
}
if(!isset($_GET['serie']))
{
    die('Und welcher serie sollen die Ordner bitteschön angehören? Versager.' );
}
?>

<form action="acceptepisodes.php" method="get"  >

<input type="hidden" name="serie" value="<?php echo $_GET['serie']; ?>" />

<table>
<tr><th>Episoden-<br />nummer</th><th>Dateipfad</th><th>Episodentitel</th></tr>



<?php
$serie = $_GET['serie'];
$directoryPath =$_GET['folder'];
if(!file_exists($directoryPath))#Falls der Paramter verkackt ist in den Standard Ordner wechseln
{
    die('Aus einem mir unerfindlichen grund esistiert der Ordner nicht.');
}
if(!is_dir($directoryPath))
{
    die('Du hast eine Datei angegeben, du noob');
}

$directory = scandir($directoryPath);#Ordner einlesen
sort($directory); // ich kann es jetzt schon sortieren, weil die ungenutzten dateien , selbst wenn sie zwischen den mp4s landen ja nicht stören
$count =0;
foreach($directory as $key=>$file) # Ordner auslesen 
{
    if(!is_dir($directoryPath.'/'.$file))#hier nach ordnern filtern 
    {
        if(preg_match('/.mp4$/', $file))
        {
        	$count += 1;
        	?>
        	
        	<tr><td><input size="3" type="text" name= "enumber<?php echo $count; ?>" value="<?php echo $count; ?>" /></td> <td> <input type="text" size="45" name="path<?php echo $count; ?>" value="<?php echo $directoryPath.'/'.$file;?>" /></td><td> <input type="text" size="8" name="title<?php echo $count; ?>" value="Folge <?php echo $count; ?>" /></td></tr>
            
            
            <?php
            //array_push($episodes,$directoryPath.'/'.$file);
            
        }
    }
    
}




?>
<tr><td><input type="submit" value="Episoden Erkennen" /></td></tr>
</form>
</table>
