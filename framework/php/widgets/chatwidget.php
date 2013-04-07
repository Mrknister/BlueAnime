<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/sidewidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/jslocation.php';


class ChatWidget extends SideWidget
{
    public function getHeaderAttributes()
    {
        $jquery = new JSLocation();
        $jquery->setLocation('/javascript/jquery-1.7.2.js');
        return array($jquery,
            new CSSLocation('chatwidget.css'),
            new JSLocation('chatwidget.js')
        );
        
    }
    public function writeContent()
    {?>
<div id="chatwidget">
    <div id="chatlog">
    </div>
    <textarea name="chatinput" id="chatinput" rows="2" ></textarea>
</div>
<?php 
    }
}
?>