<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/topwidget.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/user.php';

class DefaultTopWidget extends TopWidget
{
    public function getHeaderAttributes()
    {
        return array(
            new CSSLocation('defaulttopwidget.css')
        );
        
    }
    public function writeContent()
    {
        $user = new User();
        
    ?>
<div id="logo"> 
        <img src="/pictures/logo-kubuntu.png" width="36" /> JJS Solutions
</div>  
<div id="user">
        <?php 
        if($user->is_logged_in())
        {
            echo $user->get_name();
            if($user->is_admin())
            {
                echo '  <a href="/admin/" style="font-size:14px">Administration</a>';
            }
        }
        else {
        ?>
        
        <a href="/login.php" >login</a>/<a href="/register.php" >registrieren</a>
        <?php } ?>
</div>
<div id="team">
        <a href="/register.php" >&Uuml;ber uns</a>
</div>
        

<?php
    }
}

?>