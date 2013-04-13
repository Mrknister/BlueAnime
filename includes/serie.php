<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/error.php');

class Serie
{
    private $writable;
    public $sid;

    public $sname;
    public $userlevel;
    public $year;
    public $shortdesc;
    public $longdesc;
    public $picturename;
    
    
    public function __construct($writable = false)
    {
        if($writable)
        {
            include($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');
        }
        $this->writable = $writable;
    }
    public function loaddata()
    {
        if(!isset($this->sid))
        {
            return false;
        }
        if(!is_numeric($this->sid))
            return false;
        $mysqli = connect_with_animereader();
        $query = 'select Name,Userlevel,Year,Shortdescription,Description,Picturename from Serien where Id='.$this->sid;
        $result = $mysqli->query($query);
        if($mysqli->errno)
        {
            echo $query;
            //echo $mysqli->error;
            $mysqli->close();
            return false;
        }
        if($result->num_rows === 0)
        {
            $mysqli->close();
            return false;
        }
        $array = $result->fetch_array();
        $this->sname = $array['Name'];
        $this->userlevel = $array['Userlevel'];
        $this->year = $array['Year'];
        $this->shortdesc = $array['Shortdescription'];
        $this->longdesc = $array['Description'];
        $this->picturename = $array['Picturename'];
        
        $result->free();
        $mysqli->close();
        return true;
    }/*
    public function showdata()
    {
        
        echo $this->sname;
        echo $this->userlevel;
        echo $this->year;
        echo $this->shortdesc;
        echo $this->longdesc;
        echo $this->picturename;
    }*/
    
}

function checkexists($name)
{
    $mysqli = connect_with_animereader();
    $name = $mysqli->real_escape_string($name);
    $query = "select Id from Serien where Name = '$name'";
    $result = $mysqli->query($query);
    $mysqli->close();
    if($result->num_rows === 0)
    {
        return false;
    }
    else 
    {
        return true;
    }
}
function insert_into_genre($s_id,$genres)
{
    $query = "insert into SerieInGenre (S_ID,G_ID) values";
    if(!empty($genres)) 
    {
        foreach($genres as $g_id) 
        {
            $query .= " ($s_id,$g_id),";
        }
        $query=rtrim($query, ', ');
        $mysqli = connect_with_animewriter();
        if(!$mysqli->real_query($query))
        {
            echo $query;
            echo $mysqli->error;
            $mysqli->close();
            return false;
        }
        $mysqli->close();
        return true;
    }
    return false;
    
}

function create_new_serie($name,$userlevel,$year,$shortdesc,$longdesc,$genres)
{
    include($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');
    
    if(checkexists($name))
    {
        return 1;
    }
    if(!is_numeric($userlevel))
        return 2;
    if(strlen($year) > 16)
        return 3;
    
    if(empty($genres))
        return 4;
    
    foreach($genres as $g_id) 
    {
        if(!is_numeric($g_id))
             return 4;
    }
    
    $mysqli = connect_with_animewriter();
    
    $name = $mysqli->real_escape_string($name);    
    $year = $mysqli->real_escape_string($year);    
    $shortdesc = $mysqli->real_escape_string($shortdesc);
    $longdesc = $mysqli->real_escape_string($longdesc);
    
    $query = "insert into Serien (Name,Userlevel,Year,Shortdescription,Description,Picturename) values ('$name',$userlevel,'$year','$shortdesc','$longdesc','default.png')";
    
    if(!$mysqli->real_query($query))
    {
        echo $mysqli->error;
        return 10;
    }
    if($mysqli->errno)
    {
        echo $mysqli->error;
        $mysqli->close();
        return 10;

    }
    $id = $mysqli->insert_id; 
    
    if(! insert_into_genre($id ,$genres))
    {
        if(!$mysqli->real_query("delete from Serien where Id = $id"))
        {
            echo $mysqli->error;
        }
        $mysqli->close();
        return 10;
    }
    $mysqli->close();
    return 0;
}



?>

















