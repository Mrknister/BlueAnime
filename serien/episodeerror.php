<?php
function episode_error($error)
{
    ?>
<html>
<head>
<title>Fehler</title>
</head>
<body>
Es ist ein Fehler aufgetreten:<br>
<?php echo $error ?>
</body>
</html>
    <?php
    exit(0);
}