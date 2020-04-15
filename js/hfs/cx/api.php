
<?php
function curl_post($header,$data,$url)
    {
     $ch = curl_init();
     $res= curl_setopt ($ch, CURLOPT_URL,$url);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt ($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
     $result = curl_exec ($ch);
     curl_close($ch);
     if ($result == NULL) {
      return 0;
     }
     return $result;
    } 
$url="http://fenxi.haofenshu.com/report/obt/v1/exam/irrank?examid={$_GET["examid"]}&grade=&org=0";


     $header = array(
        'Content-Type:application/json',
        'Cookie:fxtoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpZCI6MzExMzM0MjEwNjQxOTIwMCwiZnJvbSI6InlqfHx5eXp4IiwiaWF0IjoxNTg2ODQ3MzQyfQ.UcdeiYuRJM_nZasDsTfAVC9abhiENzeFbG8U2a4DbS7QwU3FcDrvwNmBBGq6Qfgi2_ZqLm-qFD_l7yjOWWsSdA',
      
      'User-Agent: Mozilla/4.0 (compatible; MSIE .0; Windows NT 6.1; Trident/4.0; SLCC2;)'); 
    $data = '{
	"filters":{
		"offset":1,
		"limit":9999,
		"tpkey":"totalScore",
		"tgkeys":["10","11","12","13","14","15","16","17","18","19","20","22","25","26","27","08","09"],
		"search":"'.$_GET["xh"].'",
		"order":{
			"key":"score",
			"rule":"desc"
		},
		"isEs":false
	}
}';

    
    $ret = curl_post($header, $data,$url);
header('Content-type:text/json');  
echo $ret;

