<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/content.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/framework/php/csslocation.php';
class AboutContent extends Content
{
    public function getHeaderAttributes()
    {
        return array(
            new CSSLocation('aboutcontent.css')
        );
        
    }
    public function writeContent()
    {?>
 <div id="aboutcontent">
<h1>Das Projekt!</h1>
<p>Dieses Projekt soll eine Website darstellen mit einer Datenbank gefeedeten News und Chat Anwendung</p>
<h1>Das Team!</h1>
<p>Der Teamleiter: Jan "Meenhard" "Hedderich von Wyttkensteyn" Herlyn </p>
<p>Die Untertanen: Sven-Sebastian "The Resistance" Ohm, Julian "Pascal" "Ladislaus" Martin</p>
<h1>Das Ende!</h1>
<p>Ehrlich das war das Ende was erwartet ihr?! </p>
<p>Kontaktdaten : Irrelevant!</p>
</div>
    <?php }
}

?>