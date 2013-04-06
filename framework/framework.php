<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/page.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/headerattribute.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/topwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/sidewidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/content.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/jslocation.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/chatwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/defaulttopwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/emptycontent.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/newscontent.php';

function get_default_page()
{
    
    $page = new Page(new NewsContent());
    $page->addToHeader(new CSSLocation('page.css'));
    
    $page->setLeftWidget(new ChatWidget());
    $page->setRightWidget(new ChatWidget());
    $page->setTopWidget(new DefaultTopWidget());
    return $page;
}


?>