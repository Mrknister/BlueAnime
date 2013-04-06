<?php
//This file must alwas be included

function private_log_error($message,$importance = 1)  // message: message to be logged, importance: 1=just a warning for example bad login 5= shit is going down for example couldnt create folder or mysql 
{
    echo "Importance: $importance\n Message: $message\n\n"; // currently just debugging
    echo "___________________________________________________________________\n\n";
}

function handle_mysql_error($mysqli,$query) 
{
    if(! $mysqli->errno )
    {
        return false;
    }
    private_log_error("MySQL Error: During the execution of the query\n$query\nthe following error occured:\n".$mysqli->error,5);
    $mysqli->close();
    return true;
}

function public_error_page($message)
{
?>
<html>
<head>
<title>Fehler</title>
</head>
<body>
<?php echo $message; ?>
</body>
</html>
<?
exit(-1);    
}
?>