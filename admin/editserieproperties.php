<?php
require_once('onlyadminallowed.php');

if(!isset($_GET['sid']))
{
	die('Welche Serie soll ich denn bearbeiten du vollhonk?');
}
$sid=$_GET['sid'];
if(!is_numeric($sid))
{
	die('Wie wäre es mit einer Zahl? Du westfriesische Prostituierte!');
}

require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
$query = "select Serienname,Userlevel,Ordnername,Kurzbeschreibung,Bildname,Jahr from Serien where Id=$sid";
$mysqli = connect_with_animereader();
$result = $mysqli->query($query);
$row = $result->fetch_row();

$query = "select Id,Name,'In' from Genres where Id  in (Select G_ID from SerieInGenre where S_ID=$sid) union all select Id,Name,'Not In' from Genres where Id not in (Select G_ID from SerieInGenre where S_ID=$sid)"; //if anyone has a better solution I'd appreciate if he told it to me 
?>

<html>
<head>
<title><?php echo $row[0];?> Bearbeiten</title>
</head>
<body>

<form enctype="multipart/form-data" action="submitseriechanges.php" method="GET">
<table >
<tr><td>Animename:</td><td><input type="text" name="animename" value="<?php echo $row[0];?>" /></td></tr>
<tr><td>Kurzbeschreibung:</td><td><textarea name="shortdescription" rows="2" cols="30"><?php echo $row[3];?></textarea></td></tr>
<tr><td>Beschreibung:</td><td><textarea name="longdescription" rows="12" cols="40"><?php include($_SERVER['DOCUMENT_ROOT'].'/serien/'.$row[2].'/description.include'); ?></textarea></td></tr>
<!-- Genre:<input type="text" name="genre" /> -->

<tr><td>Genres:</td><td>
<table>
<?php
$query = "select Id,Name,'checked=\\\"checked\\\"' from Genres where Id  in (Select G_ID from SerieInGenre where S_ID=$sid) union all select Id,Name,'' from Genres where Id not in (Select G_ID from SerieInGenre where S_ID=$sid)"; //if anyone has a better solution I'd appreciate if he told it to me 

$count =1;
if($result2 = $mysqli->query($query))
{
	while($row2 = $result2->fetch_row()) 
	{
?>
<tr><td><?php echo $row2[1];?>:</td><td>
<input type="checkbox" name="genre[]" value="<?php echo $row2[0];?>" <?php echo $row2[2];?> />
</td></tr>
<?php
}
}

?>
</table>
</tr>
<tr> <td></td><td><input type="submit" value="Änderungen Speichern" /></td></tr>

</form>
</body>
</html>




















