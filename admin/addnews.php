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
        include_once($_SERVER['DOCUMENT_ROOT'].'/admin/newspreview.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/framework/framework.php');
        $page = get_default_page(new NewsPreview($_POST['title'],$_POST['post']));
        $page->write();
        exit(0);
    }
}
else if(isset($_POST['submit']))
{
    $error = !$is_valid;
    if($is_valid)
    {
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/news.php');
        if(create_news_entry($_POST['title'],$_POST['post']))
        {
            die('Erfolg! <a href="/index.php">Zur&uuml;ck zur Startseite</a>');
        }
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