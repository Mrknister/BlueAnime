<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/includes/serie.php');
$se= new Serie(1);
if(!$se->loaddata())
echo "error";
$se->showdata();
?>