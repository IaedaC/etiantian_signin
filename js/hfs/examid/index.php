
<!DOCTYPE html>

<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>examID</title>
    <link rel="stylesheet" href="../css/bootstrap-float-label.css">
<link rel="stylesheet" href="../css/font-awesome.4.7.0.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/slicknav.css">
<link rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" charset="UTF-8" href="../css/translateelement.css">
	</head>
<body style="">
<div class="preloader" style="display: none;">
  <span class="preloader-spin"></span>
</div>
<div class="site">
   
  
  <div class="service-area bg2 sp">
<div class="container">
<div class="section-title">
<h2>examID</h2>

</div>

	<div class="row">
	

	</div>
<div class="inner">
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
$url="http://fenxi.haofenshu.com/report/pri/v1/exam/list";


     $header = array(
        'Content-Type:application/json',
        'Cookie:'.$cookie.'fxtoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpZCI6MzExMzM0MjEwNjQxOTIwMCwiZnJvbSI6InlqfHx5eXp4IiwiaWF0IjoxNTg2ODQ3MzQyfQ.UcdeiYuRJM_nZasDsTfAVC9abhiENzeFbG8U2a4DbS7QwU3FcDrvwNmBBGq6Qfgi2_ZqLm-qFD_l7yjOWWsSdA',
      
      'User-Agent: Mozilla/4.0 (compatible; MSIE .0; Windows NT 6.1; Trident/4.0; SLCC2;)'); 
    $data = '{"offset":1,"limit":9999}';

    
    $ret = curl_post($header, $data,$url);

$obj = json_decode($ret);
$result = $obj->data->examList;

?>
  <div class="col-md-12">
                        <br>
<div class="table-responsive">
     <table id="table" class="table table-striped table-bordered" data-name="cool-table" style="background-color:white">
		
                                <thead>
									
                                <tr>
                                  
                        <th>examID</th>
						<th>考试名称</th>
                        <th>满分</th>
              
                                </tr>
                                </thead>
                                    <tbody>   

       <?php foreach($result as $key=>$row){?>
          <tr>
           
              <th><?php echo 
     $string = $row->examid;?></th>
    
              <th><?php echo 
     $string = $row->name;?></th>
                   
             <th><?php echo 
     $string = $row->manfen;?></th>
          

     

                      
                    </tr>
      <?php }?>
      </tbody>
				
				
				
				
				
                            </table>
                        </div>
                    </div>

		</div>
	


</div>
</div>




</div>
</div>


</body></html>
