<?php

class NewsEntry
{
public $id;
public $title;
public $news_text;
public $date;
public function __construct($id,$title,$text,$date)
{
    $this->id=$id;
    $this->title=$title;
    $this->text=$text;
    $this->date=$date;
}

public function set($title,$text,$date = null)
{
    if(!is_numeric($id))
    {
        return false;
    }
    
    if($date === null)
    {
        return set_title_text($title,$text);
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');
    
    $mysqli = connect_with_messageswriter();
    $title = $mysqli->real_escape_string($title);
    $text = $mysqli->real_escape_string($text);
    $date = $mysqli->real_escape_string($date);
    
    $query = "update News set Title=$title, Text=$text, CreationDate=$date where Id=$id ";
    $mysqli->real_query($query);
    if(handle_mysql_error($mysqli,$query))
    {
            return false;
    }
    $mysqli->close();
    return true;
    
}

private function set_tile_text($title,$text)
{
    if(!is_numeric($id))
    {
        return false;
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');
}
}

class News
{
private $news = null;

public function load_entries($howmany = 5,$offset = 0)
{
    if(!(is_numeric($howmany) && is_numeric($offset)))
    {
        return false;
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    $mysqli = connect_with_messagesreader();
    $query = "select Id,Title,Text,DATE_FORMAT(CreationDate,'%d.%m. %Y') as FormattedDate from News order by CreationDate desc limit $offset, $howmany";
    $result = $mysqli->query($query);
    if($mysqli->errno)
    {
        private_log_error( $mysqli->error,5);
        $mysqli->close();
        return false;
    }
    $this->news = array();
    while($tmp = $result->fetch_array())
    {
        $this->news[] = new NewsEntry($tmp['Id'],$tmp['Title'],$tmp['Text'],$tmp['FormattedDate']);
    }
    return true;
}
public function getNews()
{
    return $this->news;
}

}
function create_news_entry($title,$text)
{

    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/mysqlconfig.php');
    $mysqli = connect_with_messageswriter();
    $title = $mysqli->real_escape_string($title);
    $text = $mysqli->real_escape_string($text);
    $query = "insert into News (Title,Text,CreationDate) values ('$title','$text',Now())";
    if(!$mysqli->real_query($query))
    {
        private_log_error( $mysqli->error,5 );
        $mysqli->close();
        return false;
    }
    $mysqli->close();
    return true;
    
}
?>























