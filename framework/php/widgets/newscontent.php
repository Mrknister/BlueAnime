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

        $news = new News;
        $news->load_entries();
        foreach($news->getNews() as $newsentry)
        {
?>
<div class="newsentry">
    <div class="newstitle"><?php echo $newsentry->title; ?></div>
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