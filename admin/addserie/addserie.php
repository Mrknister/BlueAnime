<?php
require_once($_SERVER[ 'DOCUMENT_ROOT' ].'/includes/onlyadminallowed.php');
require_once($_SERVER[ 'DOCUMENT_ROOT' ].'/includes/mysqlconfig.php');
require_once($_SERVER[ 'DOCUMENT_ROOT' ].'/includes/serie.php');

$animename = '';
$shortdesc = '';
$longdesc = '';
$userlevel = '0';
$year = '';



if( isset( $_POST['animename'] ))
{
    $animename = $_POST['animename'];
}
if( isset( $_POST['shortdescription'] ))
{
    $shortdesc = $_POST['shortdescription'];
}
if( isset( $_POST['longdescription'] ))
{
    $longdesc = $_POST['longdescription'];
}

if( isset( $_POST['userlevel'] ))
{
    $userlevel=$_POST['userlevel'];
}

if( isset( $_POST['jahr']))
{
	$year=$_POST['jahr'];
}
if(isset($_POST['genres']))
{
    if( isset( $_POST['submitserie']))
    {
        $errorcode = create_new_serie($animename,$userlevel,$year,$shortdesc,$longdesc,$_POST['genres']);
        
    }
}
else 
{
    $errorcode = 4;
}
echo $errorcode;
?>

<html>
<head>
<title>
Serie Hinzufügen
</title>
<script type="text/javascript" src="../javascript/jquery-1.7.2.js"></script>
</head>
<body>
<form enctype="multipart/form-data" action="addserie.php" method="POST">
<table >
<?php
if($errorcode === 10)
{
?>
<tr>Es ist ein interner Fehler aufgetreten</tr>
<?php
}
?>
</tr>
<tr><td>Animename:</td><td><input type="text" name="animename" value="<?php echo $animename; ?>" /></td>
<?php
if($errorcode === 1)
{
?>

<td>Eine Serie mit diesem Namen wurde bereits hinzu gefügt.</td>
<?php
}
?>
</tr>


<tr><td>Kurzbeschreibung:</td><td><textarea name="shortdescription" rows="2" cols="30"><?php echo $shortdesc; ?></textarea></td></tr>
<tr><td>Beschreibung:</td><td><textarea name="longdescription" rows="12" cols="40"><?php echo $longdesc; ?></textarea></td></tr>
<!-- Genre:<input type="text" name="genre" /> -->

<tr><td>Genres:</td><td>
<table >


<?php // Show genres
$mysql = connect_with_animereader();
$query = "select Id,Name from Genres";
$count = 1;
if($result = $mysql->query($query))
{
	   while($row = $result->fetch_row()) 
	   {
?>

<tr><td><?php echo $row[1];?>:</td><td>
<input type="checkbox" name="genres[]" value="<?php echo $row[0];?>" />
</td></tr>

<?php
$count += 1;
    }
}
?>
</table>
<?php
if($errorcode === 4)
{
?>
<td>Mindestens ein Genre muss angegeben sein.</td>
<?php
}
?>
</td></tr>

<tr><td>UserLevel:</td><td><input type="text" name="userlevel" value="<?php echo $userlevel; ?>" /></td>
<?php
if($errorcode === 2)
{
?>
<td>Bitte gebe eine Zahl ein.</td>
<?php
}
?>
</tr>
<tr><td>Erscheinungs Datum:</td><td><input type="text" name="jahr" value="<?php echo $year; ?>" />
<?php
if($errorcode === 3)
{
?>
<td>Das Erscheinungsdatum darf maximal 16 Zeichen lang sein</td>
<?php
}
?>
</tr>

<tr><td></td><td><input type="submit" value="Best&auml;tigen" /></td></tr>
</table>
<input type="hidden" name="submitserie" value="true" />

</form>

</body>
</html>
