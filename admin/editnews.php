<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Edit News</title>
</head>
<body>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/onlyadminallowed.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/news.php');

if(!isset($_GET['id']) && !isset($_POST['id']))
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


$text='';
$title='';
$error=false;
if(isset($_POST['submit']))
{
    
    $is_valid = default_post('title') & default_post('post');
    $title = $_POST['title'];
    $text = $_POST['post'];
    $entry = new Entry($_GET['id']);
    if($entry->set($_POST['title'],$_POST['post']))
    {
        die('success');
    }
    else
    {
        $error=true;
    }
}
else 
{
    $entry = new NewsEntry();
    if(!$entry->loadEntry($_GET['id']))
    {
        die('Unable to load News.');
    }
    $title = $entry->title;
    $text = $entry->text;
}


?>
<form action="editnews.php?id=<?php echo $_GET['id'];?>" method="post">
<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Titel" /><br>
<textarea name="post" rows="10" cols="40"><?php echo $text; ?></textarea>
<br>
<input name="submit" value="Best&auml;tigen" type="submit" />
</form>
</body>
</html>