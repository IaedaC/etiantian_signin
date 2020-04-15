<meta charset="utf-8">  

<?php 
$url = "http://62.234.20.151/cx/api.php?examid={$_GET["examid"]}&xh={$_GET["xh"]}";
$contents = file_get_contents($url);
echo file_put_contents("{$_GET["xh"]}&{$_GET["examid"]}.json",$contents);
$content = file_get_contents(''.$_GET["xh"].'&'.$_GET["examid"].'.json');
$content = str_replace('</br>','',$content);
file_put_contents(''.$_GET["xh"].'&'.$_GET["examid"].'.json',$content);
?>
<?php
header("content-type: text/html; charset=utf-8");
header("HTTP/1.1 302 Moved Permanently"); 
header("Location: http://62.234.20.151/cx/cx.php?examid={$_GET["examid"]}&xh={$_GET["xh"]}"); 
?>