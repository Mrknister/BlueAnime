<html>
<head>
<title>Serien Übersicht</title>
</head>
<body>
<table summary="" >

<?php
require_once('onlyadminallowed.php');

function listSeries()
{
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    $mysqli = connect_with_animereader();
    
    $query="select Id,Serienname,Kurzbeschreibung from Serien ";
    
    $query_result=$mysqli->query($query);
    if(!$query_result)
    {
        die('Error!'.$mysqli->error);
    }
    
    if( $query_result->num_rows === 0 )
    {
        echo 'Keine Serien gefunden';
        return;
    }
    while($row=$query_result->fetch_array()) 
    {?>
       <tr><td><?php echo $row[1];?></td><td><a href="/admin/addmultipleepisodes.php?serie=<?php echo $row[0];?>"> Folgen automatisch hinzufügen</a></td></tr>
    <?php
    }
    $mysqli->close();
}
listSeries();
?>

</table>
</body>
</html>