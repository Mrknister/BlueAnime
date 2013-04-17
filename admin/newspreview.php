<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/content.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';

class NewsPreview extends Content
{
    private $title;
    private $post;
    public function __construct($title,$post)
    {
        $this->title = $title;
        $this->post = $post;
    }
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
?>
<div class="newsentry">
    <div class="newstitle"><?php echo $this->title ?></div>
    <div class="newscontent">
        <?php echo $this->post; ?>
    </div>
    <div class="newsdate"><?php  ?></div>
</div>

<?php
        
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