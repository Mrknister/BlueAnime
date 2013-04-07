<?php
function bbc2html($tmpText){
 /*[b]*/ $tmpText = preg_replace('#\[b\](.*)\[/b\]#isU', '<b>$1</span>', $tmpText);
 /*[i]*/ $tmpText = preg_replace('#\[i\](.*)\[/i\]#isU', '<i>$1</span>', $tmpText);
 /*[u]*/ $tmpText = preg_replace('#\[u\](.*)\[/u\]#isU', '<span style="text-decoration:underline">$1</span>', $tmpText);
 /*[color]*/ $tmpText = preg_replace('#\[color=(.*)\](.*)\[\/color\]#isU', '<span style="color:$1;">$2</span>', $tmpText);
 /*[size] */ $tmpText = preg_replace('#\[size=([0-9]{1,2})\](.*)\[\/size\]#isU', '<span style="font-size:$1px;">$2</span>', $tmpText);
 /*[font] */ $tmpText = preg_replace('#\[font=(.*)\](.*)\[\/font\]#isU', '<span style="font-family:$1;">$2</span>', $tmpText);
 /*[url]*/ $tmpText = preg_replace('#\[url=(.*)\](.*)\[\/url\]#isU', '<a href="$1">$2</a>', $tmpText);
 /*[url]*/ $tmpText = preg_replace('#\[url\](.*)\[\/url\]#isU', '<a href="$1">$1</a>', $tmpText);
 /*[img]*/ $tmpText = preg_replace('#\[img\](.*)\[\/img\]#isU', '<img src="$1" alt="Bild" />', $tmpText);
 /*[center]*/ $tmpText = preg_replace('#\[center\](.*)\[\/center\]#isU', '<div style="text-align:center">$1</div>', $tmpText);
 /*[right] */ $tmpText = preg_replace('#\[right\](.*)\[\/right\]#isU', '<div style="text-align:right">$1</div>', $tmpText);
  return $tmpText;
}
?> 