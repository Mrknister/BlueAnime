<html>
<head>
<title>News L&ouml;schen</title>
</head>
<body>
<?php
if(!isset($_GET['id']))
{
	die('Nicht gen&uuml;gend Parameter.');
}

require_once($_SERVER['DOCUMENT_ROOT'].'/includes/news.php');
if(delete_news_entry($_GET['id']))
{
	echo 'News erfolgreich gel&ouml;scht. <a href="/index.php"> zur&uuml;ck';
}
else 
{
	echo 'Es ist ein fehler aufgetreten.';
}
?>
</body>
</html>
