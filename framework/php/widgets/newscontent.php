<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/content.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';
class NewsContent extends Content
{
    public function getHeaderAttributes()
    {
        return array(
            new CSSLocation('newscontent.css')
        );
        
    }
    public function writeContent()
    {
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/news.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/includes/user.php');
        $user = new User();
        $news = new News;
        $news->load_entries();
        if($user->is_admin())
        {?>
<div class="newsentry">
    <div class="newstitle"><a href="/admin/addnews.php" >News Hinzuf&uuml;gen</a></div>
</div>
<?php
        }
        foreach($news->getNews() as $newsentry)
        {
?>
<div class="newsentry">
    <div class="newstitle"><?php echo $newsentry->title; ?><?php if($user->is_admin()){ echo ' <a href="/admin/editnews.php?id='.$newsentry->id.'" style="font-size:14px;">(bearbeiten)</a>'; }?></div>
    <div class="newscontent">
        <?php echo $newsentry->text; ?>
    </div>
    <div class="newsdate"><?php echo $newsentry->date; ?></div>
</div>
<?php
        }
    }
}

?>