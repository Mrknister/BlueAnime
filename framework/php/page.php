<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/headerattribute.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/topwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/sidewidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/content.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/widgets/emptycontent.php';



class Page 
{
    private $title = '';
    private $headerattributes = array();
    private $topwidget;
    private $leftwidget;
    private $rightwidget;
    private $content;
    public function __construct($content = null)
    {
        if($content == null)
        {
            $this->content = new EmptyContent();
        }
        else 
        {
            $this->content = $content;
        }
        
    }
    public function addToHeader(HeaderAttribute $attrib)
    {
        $this->headerattributes[] = $attrib;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTopWidget(TopWidget $widget)
    {
        $this->topwidget = $widget;
    }
    public function setLeftWidget(SideWidget $widget)
    {
        $this->leftwidget = $widget;
    }
    public function setRightWidget(SideWidget $widget)
    {
        $this->rightwidget = $widget;
    }
    public function setContent(Content $content)
    {
        $this->content = $content;
    }
    public function write()
    {
        $allhattribs = array_merge($this->headerattributes,$this->content->getHeaderAttributes());
        
        $contentwidth=100;
        
        if(isset($this->topwidget))
            $allhattribs = array_merge($allhattribs,$this->topwidget->getHeaderAttributes());
            
        if(isset($this->leftwidget))
        {
            $allhattribs = array_merge($allhattribs,$this->leftwidget->getHeaderAttributes());
            $contentwidth -=20;
        }
            
        if(isset($this->rightwidget))
        {
            $allhattribs = array_merge($allhattribs,$this->rightwidget->getHeaderAttributes());
            $contentwidth -=20;
        }
        
//write the usual htmlstuff
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $this->title; ?></title>
<?php //write the header attributes
        foreach($allhattribs as $attribute) 
        {
            echo $attribute->getHtmlTag();
        }
?>

<style type="text/css">

#content
{
    height: 100%;
    width: <?php echo $contentwidth ?>%;
    background-color: #f2f1f0;
    float: left;
    
}

</style>


</head>
<body bgcolor="black">
<div id="page">
<?php // write the topwidget
        if(isset($this->topwidget))
        {
        echo '<div id="topwidget">'; 
        $this->topwidget->writeContent(); 
        echo '</div>';
        } // end of writing the topwidget
        echo '<div id="main">';
        if(isset($this->leftwidget)) //start writing the leftwidget
        {
            echo '<div id="leftwidget">';
            $this->leftwidget->writeContent();
            echo '</div>';

        } // end of writing the leftwidget

        echo '<div id="content">';//write the content
        $this->content->writeContent();
        echo '</div>'; //content finished
        if(isset($this->rightwidget)) //here starts the rightwidget
        {
            echo '<div id="rightwidget">'; 
            $this->rightwidget->writeContent();
            echo '</div>';
        } // end of writing the rightwidget
        echo '</div>';
?>
</div>
</body>
</html>
<?php
    }// end of endcontent
}//end of class



?>