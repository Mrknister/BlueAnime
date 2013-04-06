<?php
function default_post($value,$default = '')
{
    if(!isset($_POST[$value]) or $_POST[$value]==='')
    {
        $_POST[$value] = $default;
        
        return false;
    }
    return true;
}

function perform_registration()
{
if(!default_post('username'))
{
return -1;
}
if(!default_post('email'))
{
return -2;
}
if(!default_post('password'))
{
return -6;
}
if(strlen($_POST['password'])<8)
{
    return -6;
}
if(!default_post('password2') or $_POST['password'] !== $_POST['password2'])
{
    return -7;
}


session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/registerfunctions.php';
$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) 
{
// the code was incorrect
// you should handle the error so that the form processor doesn't continue
return -5;
}

return register($_POST['username'],$_POST['password'],$_POST['email']);
}


$error =0;
if(isset($_POST['register']))
{
$error = perform_registration();
if($error===0)
{
header('Location: /home.php');
exit(0);
}
else {
    echo 'Error:'.$error;
}

}

function echo_error_html($errormessage)
{
    echo '<font color="red">'.$errormessage.'</font>';
}
?>
<html>
<head>
<title>
Registrieren
</title>
<script type="text/javascript" src="../javascript/jquery-1.7.2.js"></script>
<style type="text/css">
#clearfloater
{
	height:50%; 
	margin-bottom:-95px;
	}
#register
{
	margin-left: auto;
	margin-right: auto;
	height: 10%;
	width: 190px;
	margin-top: auto;
	clear: both;
	position:relative;
	text-align: center;
	
}
.registerinput
{
	width: 100%;
	height: 40px;

	}
#register a
{
	color: black;
	text-decoration: none;
}
#captcha
{
	width: 100%;
}
</style>
</head>
<body>
<div id="clearfloater"></div>
<div id="register">
<form action="register.php" method="post">
<div><input type="text" name="username" placeholder="Username" class="registerinput"><?php if($error === -1){echo_error_html('Der Nutzername ist ungültig oder existiert bereits.');}?></div>
<div><input type="password" name="password" placeholder="Passwort" class="registerinput"><?php if($error === -6){echo_error_html('Das Passwort ist zu kurz.');}?></div>
<div><input type="password" name="password2" placeholder="Passwort wiederhohlen" class="registerinput"><?php if($error === -7){echo_error_html('Die Passwörter stimmen nicht überein.');}?></div>
<div><input type="text" name="email" placeholder="E-Mail" class="registerinput"><?php if($error === -2){echo_error_html('Die e-mail ist ungültig.');}?></div>
<div><img  id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" ></div>
<div><input type="text" name="captcha_code" placeholder="Captcha" class="registerinput"><?php if($error === -5){echo_error_html('Der eingegebene Code ist ungültig.');}?></div>
<div><a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false" class="registerinput">[ Different Image ]</a></div>
<div><input name="register" type="submit" value="Registrieren"></div>
</form>
</div>
</body>
</html>












