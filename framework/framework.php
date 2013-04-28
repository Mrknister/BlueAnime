<?php
//the central class
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/page.php';

//the following abstract classes are already included by page.php
/*
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/headerattribute.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/topwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/sidewidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/content.php';
*/

require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/jslocation.php';


require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/chatwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/defaulttopwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/emptycontent.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/newscontent.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/aboutcontent.php';

function get_default_page($content = null)
{
    
    $page = new Page($content);
    $page->addToHeader(new CSSLocation('page.css'));
    
    $page->setLeftWidget(new ChatWidget());

    $page->setTopWidget(new DefaultTopWidget());
    return $page;
}


?>