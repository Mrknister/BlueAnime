<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/headerattribute.php';

class CSSLocation extends HeaderAttribute 
{
private $location;

    
    public function __construct($name = '')
    {
        $this->location = '/framework/css/'.$name;
    }
    public function getLocation()
    {
        return $this->location;
    }
    public function setName($name)
    {
        $this->location = '/framework/css/'.$name;
    }
    public function getHtmlTag()
    {
        return '<link rel="stylesheet" type="text/css" href="'.$this->location.'" />';
    }
}

?>