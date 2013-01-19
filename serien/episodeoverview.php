
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/userfunctions.php'); // includes mysqlconfig.php

if( !isset($_GET['serie']) )
{
	die('Du musst schon eine Serie angeben');
}


$serieid = $_GET['serie'];
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/serie.php');

?>
<html>
<head>
    <title><?php echo $row[0]?></title>
    <link rel="stylesheet" type="text/css" href="episodeoverview.css" />
</head>
<body>
<div id="overview">
<img src="<?php echo $row[4].'/'.$row[5]?>" alt="" id="previewimage" />
<div id="description"><?php include($row[4].'/description.include');?></div>

</div>
<!-- 
<div id="episodelist">

<table>
<tr><th>Folge</th><th>Titel</th></tr>

</table>
</div>
 -->

</html>
<?php
$mysql->close();
?>












