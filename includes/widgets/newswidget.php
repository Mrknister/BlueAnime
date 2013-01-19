
<div id="newswidget">
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/news.php');
$news = new News;
$news->load_entries();
foreach($news->news as $newsentry)
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
?>
</div><!-- newswidget -->
