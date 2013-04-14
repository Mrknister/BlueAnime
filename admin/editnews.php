<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Edit News</title>
</head>
<body>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');
if(!isset($_GET['id']))
{
    die('Nicht gen&uuml;gend Parameter.');
}
if(!is_numeric($_GET['id']))
{
    die('ung&uuml;ltiger Parameterwert.');
}



function default_post($value,$default = '')
{
    if(!isset($_POST[$value]) or $_POST[$value]==='')
    {
        $_POST[$value] = $default;
        
        return false;
    }
    return true;
}


//doing some checks related to both of possibilities
$is_valid = default_post('title') & default_post('post');
$error = false;
?>
<form action="addnews.php" method="post">
<input type="text" name="title" value="<?php echo $_POST['title']; ?>" placeholder="Titel" /><br>
<textarea name="post" rows="10" cols="40"><?php echo $_POST['post']; ?></textarea>
<br>
<input name="submit" value="Best&auml;tigen" type="submit" />
<input name="preview" value="Vorschau" type="submit"/>
</form>
</body>
</html>