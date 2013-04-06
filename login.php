<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/user.php');
$success = true;
if(isset($_POST['username']) && isset( $_POST['password'] ))
{
    
    
    $user = new User();
    $success =  $user->login($_POST['username'],  $_POST['password']);
    if($success === true)
    {
        header('Location: /home.php');
        exit(0);
    }
    
    
}
?>


<html>
<head>
<title>Login</title>
</head>
<body bgcolor="#5555ff" >

<style type="text/css">
#loginfloater
{
	height:50%; 
	margin-bottom:-95px;
	}
#login
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
.logininput
{
	width: 100%;
	height: 40px;
	}

#loginbutton
{
	margin-top: 15px;
}
#login a
{
	color: black;
	text-decoration: none;
	}
</style>
<div id="loginfloater"></div>
<div id="login">

<form action="login.php" method="post">
<?php 
if($success === false)
{
    ?>
<div style="color:darkred"> Passwort inkorrekt oder der User existiert nicht. </div>
<?php
}
?>
<div><input type="text" name="username" placeholder="Username" class="logininput" ></div>
<div><input type="password" name="password" placeholder="Passwort" class="logininput" ></div>
<div id="loginbutton"><input type="submit" value="Log In" class="logininput" id="loginbutton" class="logininput" ></div>
</form>
<a href="register.php" >Need to register?</a>
</div>
</body>
</html>