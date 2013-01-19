<?php
function save_uploaded_file($filename,$targetpath)
{
	if(!isset($_FILES[$filename]))
		return 'Error: Bitte lade ein Bild hoch.';
	
	
	//$targetpath =$targetpath.$_FILES[$filename]['name'];
	
	
	if(preg_match("%\.png$%", $_FILES[$filename]['name'])) 
	{
		$targetpath = $targetpath.'preview.png';
		$newname = 'preview.png';
	}
	
	elseif(preg_match("%\.jpg$%", $_FILES[$filename]['name'])) 
	{
		$targetpath = $targetpath.'preview.jpg';
		$newname = 'preview.jpg';
	}
	elseif(preg_match("%\.jpeg$%", $_FILES[$filename]['name'])) 
	{
		$targetpath = $targetpath.'preview.jpeg';
		$newname = 'preview.jpeg';
	}
	else 
	{
		return 'Error: Das Dateiformat wurde nicht erkannt';
	}
		

	
    

	if(!move_uploaded_file($_FILES[$filename]['tmp_name'], $targetpath))
	{
		die('Es ist ein Fehler beim Hochladen der Datei aufgetreten.');
	}
	return $newname;
}


?>