<?php
//require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');

//works similar isset except that it sets a default value
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



if(isset($_POST['preview']))
{
    $error = !$is_valid;
    if($is_valid)
    {
        echo "Preview";
    }
}
else if(isset($_POST['submit']))
{
    $error = !$is_valid;
    if($is_valid)
    {
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/news.php');
        create_news_entry($_POST['title'],$_POST['post']);
    }
}


?>





 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Add News</title>
</head>
<body>
<?php
if($error)
{
    echo "<font color='red'>Bitte einen Titel und einen Text angeben.</font><br>";
}
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