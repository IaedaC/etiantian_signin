<?php
header("content-type: text/html; charset=utf-8");
header("HTTP/1.1 302 Moved Permanently"); 
header("Location: http://62.234.20.151/cx/json/admin.php?examid={$_GET["examid"]}&xh={$_GET["xh"]}"); 
?>
<?php
$ch =curl_init();
curl_setopt($ch,CURLOPT_URL,'http://62.234.20.151/cx/km-1.php?examid='.$_GET["examid"].'');
$header = array();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_COOKIE,'fxtoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpZCI6MzExMzM0MjEwNjQxOTIwMCwiZnJvbSI6InlqfHx5eXp4IiwiaWF0IjoxNTg2ODQ3MzQyfQ.UcdeiYuRJM_nZasDsTfAVC9abhiENzeFbG8U2a4DbS7QwU3FcDrvwNmBBGq6Qfgi2_ZqLm-qFD_l7yjOWWsSdA');
$content = curl_exec($ch);
?>
