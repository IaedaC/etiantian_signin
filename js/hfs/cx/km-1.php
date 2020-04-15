<meta charset="utf-8">  
<?php 
$url = "http://62.234.20.151/cx/km-2.php?examid={$_GET["examid"]}";
$contents = file_get_contents($url);
echo file_put_contents("km.json",$contents);
$content = file_get_contents('km.json');
$content = str_replace('</br>','',$content);
file_put_contents('km.json',$content);
?>