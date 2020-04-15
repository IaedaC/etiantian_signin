<?php
header("Content-type:text/html;Charset=utf8");
$ch =curl_init();
curl_setopt($ch,CURLOPT_URL,'http://fenxi.haofenshu.com/report/obt/v1/exam/info?examid='.$_GET["examid"].'&org=0');
$header = array();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_COOKIE,'fxtoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpZCI6MzExMzM0MjEwNjQxOTIwMCwiZnJvbSI6InlqfHx5eXp4IiwiaWF0IjoxNTg2ODQ3MzQyfQ.UcdeiYuRJM_nZasDsTfAVC9abhiENzeFbG8U2a4DbS7QwU3FcDrvwNmBBGq6Qfgi2_ZqLm-qFD_l7yjOWWsSdA');
$content = curl_exec($ch);
echo $content;
?>
