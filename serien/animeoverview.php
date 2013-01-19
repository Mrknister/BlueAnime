<html>
<head>
<title>Animes</title>
<link rel="stylesheet" type="text/css" href="animeoverview.css" />
<script src="../javascript/jquery-1.7.2.js" type="text/javascript" > </script>
<script type="text/javascript" >


function load_description(image,desctext)
{
	$("#leftpreview").show();
	document.previewimage.src=image;
	$("#previewdescription").load(desctext);
}
</script>


</head>
<body>

<div id="animelist">

<table>
<tr><th>Name</th><th>Genre</th><th>Erscheinungsdatum</th>
</tr>

<?php
require_once('../includes/userfunctions.php'); // includes mysqlconfig.php

session_start();
$userlevel = 0;

if(isset($_SESSION['Id']))
{
	$userlevel =  get_user_level($_SESSION['Id']);
}

$mysql = connect_with_animereader();
$query = "Select S.Serienname,GROUP_CONCAT(G.Name separator ',' ),S.Jahr,S.Ordnername,S.Bildname,S.Id from Serien as S,Genres as G,SerieInGenre as sig where G.Id=sig.G_ID and S.Id=sig.S_ID and S.Userlevel <= 0 group by S.Serienname";
if(!$result = $mysql->query($query))
{
	die('Es ist ein interner Fehler aufgetreten!');
}
$colorbool = true;
while($row = $result->fetch_row())
{
	if( $colorbool)
		$color = 'tablecolor1';
	else 
		$color = 'tablecolor2';
?>

<tr class="<?php echo $color; ?>"><td><a href="episodeoverview.php?serie=<?php echo $row[5]; ?>" onmouseout="$('#leftpreview').hide()" onMouseOver="load_description('<?php echo $row[3].'/'.$row[4]; ?>','<?php echo $row[3].'/description.include'; ?>')"><?php echo $row[0]; ?></a></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td></tr>
<?php
$colorbool = !$colorbool;
}
?>
</table>
</div>

<div id="leftpreview" >
<img name="previewimage" src="Image.jpg" alt="testbild" />
<div id="previewdescription">taoaöodfiuhdöoauewh fösiduhfvjraleiu bgvylöiuvhxöargdagerrfdgs</div>
</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>










