<?php
function error_adding($message) {
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Fehler</title>
</head>

<body>
<div></div>
Während dem Hinzufügen der Serie ist ein Fehler aufgetreten:<br>
<?php echo $message; ?>
</body>
</html>
<?php 
exit(-1);
}
?>