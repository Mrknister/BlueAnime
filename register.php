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
<form action="submitregistration.php" method="post">
<div><input type="text" name="username" placeholder="Username" class="registerinput"></div>
<div><input type="password" name="password" placeholder="Passwort" class="registerinput"></div>
<div><input type="text" name="email" placeholder="E-Mail" class="registerinput"></div>
<div><img  id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" ></div>
<div><input type="text" name="captcha_code" placeholder="Captcha" class="registerinput"></div>
<div><a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false" class="registerinput">[ Different Image ]</a></div>
<div><input type="submit" value="Registrieren"></div>
</form>
</div>
</body>
</html>












