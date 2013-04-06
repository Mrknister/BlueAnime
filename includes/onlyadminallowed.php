<?php
require_once($_SERVER[ 'DOCUMENT_ROOT' ].'/includes/user.php');

$c_user = new User;
if(!$c_user->is_admin())
{
	die('Du hast keine Rechte!');
}
?>