<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/content.php';

class NewsContent extends Content
{
    public function getHeaderAttributes()
    {
        return array(
            
        );
        
    }
    public function writeContent()
    {
        echo "News Here!";
    }
}

?>