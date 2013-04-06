<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/sidewidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/jslocation.php';


class ChatWidget extends SideWidget
{
    public function getHeaderAttributes()
    {
        return array(
            new CSSLocation('chatwidget.css'),
            new JSLocation('chatwidget.js')
        );
        
    }
    public function writeContent()
    {
        echo "Chat";
    }
}
?>