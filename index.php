<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/framework.php';
$page = get_default_page();
$page->setContent(new NewsContent());
$page->write();
?>