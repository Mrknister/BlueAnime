<?php

function checkSerie($animename,$foldername) 
{
    $mysqli = mysqli_connect("127.0.0.1", "AnimeReader", "5oqvENa0Xe2h5Wsa", "BlueAnime");
    if (mysqli_connect_errno($mysqli))
    {
        die( "Failed to connect to MySQL: " . mysqli_connect_error());
    }
    
    $escaped_animename=$mysqli->real_escape_string($animename);
    $escaped_foldername=$mysqli->real_escape_string($foldername);
    
    
    
    $query="select Id,SerienName,OrdnerName from Serien where SerienName = '$escaped_animename' or OrdnerName = '$escaped_foldername'";
    
    $query_result=$mysqli->query($query);
    if(!$query_result)
    {
        die('Error!'.$mysqli->error);
    }
    
    if($query_result->num_rows!==0)
    {
        $existing_entry=$query_result->fetch_array();
        
        if($existing_entry[1]==$animename)
            return -1;
            
        if($existing_entry[2]==$foldername)
            return -2;
    }
    
    $mysqli->close();
    return 0;
}


?>