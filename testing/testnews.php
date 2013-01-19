<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/news.php');

$news = new News();
/*
$news->load_entries();
foreach($news->news as $entry)
{
    echo 'Id: '.$entry->id.'<br>';
    echo 'Title: '.$entry->title.'<br>';
    echo 'Text: '.$entry->text.'<br>';
    echo 'CreationDate: '.$entry->date.'<br>';
}*/
$news->create_entry('test5','Noch ein Text, der verschiedene tests enthält!');

?>