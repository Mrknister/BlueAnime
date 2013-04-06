<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');

if(!isset($_GET['serie']))
{
    die('Der Parameter serie ist nicht gesetzt. Schäm dich.');
}
if(!is_numeric($_GET['serie']))
{
    die('Aha... Du willst mir also einen nicht numerischen serienparameter andrehen. Ts Ts Ts.');
}
$serie=(int) $_GET['serie'];

$mysqli = connect_with_episodereader();
$query='select * from Serien where Id = '.$serie;
$query_result=$mysqli->query($query);
$serien_result=$query_result->fetch_array();

$query = 'select * from Folgen where SerienId = ' . $serie;
$folgen_result = $mysqli->query( $query );
?>
<style type="text/css">
body
{
	text-align:center;
}
#ordnerauswahl,#addedepisodes
{
	padding: 10px;
	text-align: left;
	border-style:solid; 
	border-width: 1px;
	width:400px;
	margin-top: 20px;
	margin-left: auto;
	margin-right: auto;
	margin-bottom:  9px;
	
}
#atodetectanzeige
{
	padding: 10px;
	text-align: left;
	border-style:solid; 
	border-width: 1px;
	width:700px;
	margin-top: 20px;
	margin-left: auto;
	margin-right: auto;
	margin-bottom:  9px;
	
}
</style>
<html>
<head>
<script src="../javascript/jquery-1.7.2.js" type="text/javascript"></script>
<script type="text/javascript" >
function on_ordnerauswahl_click()
{
    $("#atodetectanzeige").load("autodetectepisodes.php?folder="+document.getElementById("chosenfolder").innerHTML+"&serie=<?php echo $serie?>")
}
</script>
<title><?php echo $serien_result[1]; ?> Bearbeiten</title>
</head>
<body>

<div id="addedepisodes">
<strong>Bereits hinzugefügte Folgen:<br><br></strong>
<?php
if($folgen_result->num_rows <= 0)
{
	echo '<center ><em>--- Bisher keine ---</em></center>';
}
else 
{
	while($episode=$folgen_result->fetch_array()) 
	{
	    echo "<li>Folgenname: \"$episode[3]\" Pfad: \"$episode[4]\"";
	}
}
?>

</div>
<br/><br/>
<div id="ordnerauswahl">
<strong>Ordner Auswählen:</strong><br /><br />
<?php
include('directorystructure.php');
dirStructure();
?>

</div>

<input type="button" value="Ordner Auswählen" onclick="on_ordnerauswahl_click()"  />


<div id="atodetectanzeige">
</div>
</body>
</html>




