<?php

function dirStructure( $directoryPath = null )
{
    	if($directoryPath === null)
	       $directoryPath = $_SERVER['DOCUMENT_ROOT'];
    if(!file_exists($directoryPath))#Falls der Paramter verkackt ist in den Standard Ordner wechseln
    {
        $directoryPath = $_SERVER['DOCUMENT_ROOT'];
        echo 'Directory didn\'t exist. Changed to'.$_SERVER['DOCUMENT_ROOT'].'<br>';
    }
    echo '<div id="chosenfolder">'.$directoryPath.'</div>';#Pfad ausgeben
    
    
    $directory = scandir($directoryPath);#Ordner einlesen
    
    $files=array();#Array um Ordner und Dateien zu trennen
    
    foreach($directory as $key=>$file) # Ordner auslesen 
    {
        if(is_dir($directoryPath.'/'.$file))#hier nach ordnern filtern 
        {
            if($file=='.')# falls der Ordner nur auf das gleiche Verzeichnis zeigt nichts tun
                ;
            else if($file=='..') # Übergeordneter Ordner ( Ordnerception :D )
            {
                echo '<li><a href="javascript:void(0)" onclick="$(\'#ordnerauswahl\').load(\'loadfolder.php?dir='.dirname($directoryPath).'\')">Parent Directory</a></li>'; # das dirname ist da um den Ordner schön aussehen zu lasen
            }
            else #Alle sonstigen Ordner
            {
                echo '<li><a href="javascript:void(0)" onclick="$(\'#ordnerauswahl\').load(\'loadfolder.php?dir='.$directoryPath.'/'.$file.'\')">'.$file.'</a></li>';
                #echo '<li><a href="test.php?dir='.$directoryPath.'/'.$file.'">'.$file.'</a></li>';
            }
        }
        else  #wenn es kein Ordner ist, den dateinamen in das Dateien-array speichern
        {
            array_push($files,$file); 
        }
    }
    
    foreach($files as $key=>$file)#Dateien zur schönheit mit ausgeben
    {
        echo '<li>'.$file.'</li>';
    }
}
?>
