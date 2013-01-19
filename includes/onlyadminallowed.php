<?php
require_once($_SERVER[ 'DOCUMENT_ROOT' ].'/includes/userfunctions.php');

if(get_user_level()<100)
{
	die('Du hast keine Rechte!');
}
?>