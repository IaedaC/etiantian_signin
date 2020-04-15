
<?php
error_reporting(0);
$url = "http://62.234.20.151/cx/json/{$_GET["xh"]}&{$_GET["examid"]}.json";
$url2 = "http://62.234.20.151/cx/km.json";
$json = file_get_contents($url);
$json2 = file_get_contents($url2);
$obj = json_decode($json);
$obj2 = json_decode($json2);
$result = $obj->data;
$result2 = $obj2->data;
?>
<html>
<head lang="zh-hans">
<meta charset="UTF-8">
<title>好分数成绩查询</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



</head>
<body>
	
  <div class="container">
  	<div class="table-basic">
        <h1 class="page-header"><?php echo '  ';
          $str = "/这里别管/"; // 关键字正则字符串 
$string = $result->students[0]->name;    // 文本字符串 

echo preg_replace($str , "[隐私]", $string);    //preg_replace() 执行一个正则表达式的匹配和替换
          echo ' [';echo $result->students[0]->class;echo '班]';?>
        </h1>
            <h4><?php
				echo $result2->examInfo->name
;?></h4>
    
      <div class="row">
     
        
  <table class="table table-striped"  style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">

                <thead>
                    <tr>
                     
                        <th>总分</th>
                        <th>班排</th>
                        <th>联考</th>
                        <th>年排</th>
                       <th>key</th>
                    </tr>
                </thead>
                <tbody>   
          <tr>         
           
                        <th><?php echo $result->students[0]->subjectRank->totalScore->score;?></th>
                        <th><?php 
       if($result->students[0]->subjectRank->totalScore->class==1 or $result->students[0]->subjectRank->totalScore->class==2 or $result->students[0]->subjectRank->totalScore->class==3){
echo "[隐私]";}else{echo $result->students[0]->subjectRank->totalScore->class
;};
    ?></th>
                         <th> <?php 
       if($result->students[0]->subjectRank->totalScore->all==1 or $result->students[0]->subjectRank->totalScore->all==2 or $result->students[0]->subjectRank->totalScore->all==3 
              or $result->students[0]->subjectRank->totalScore->all==4 or $result->students[0]->subjectRank->totalScore->all==5 or $result->students[0]->subjectRank->totalScore->all==6
               or $result->students[0]->subjectRank->totalScore->all==7 or $result->students[0]->subjectRank->totalScore->all==8 or $result->students[0]->subjectRank->totalScore->all==9
               or $result->students[0]->subjectRank->totalScore->all==10){
echo "[隐私]";}else{echo $result->students[0]->subjectRank->totalScore->all
;};
    ?></th>
                        <th> <?php 
       if($result->students[0]->subjectRank->totalScore->school==1 or $result->students[0]->subjectRank->totalScore->school==2 or $result->students[0]->subjectRank->totalScore->school==3 
              or $result->students[0]->subjectRank->totalScore->school==4 or $result->students[0]->subjectRank->totalScore->school==5 or $result->students[0]->subjectRank->totalScore->school==6
               or $result->students[0]->subjectRank->totalScore->school==7 or $result->students[0]->subjectRank->totalScore->school==8 or $result->students[0]->subjectRank->totalScore->school==9
               or $result->students[0]->subjectRank->totalScore->school==10){
echo "[隐私]";}else{echo $result->students[0]->subjectRank->totalScore->school
;};
    ?></th>
                              <th><?php echo $result->students[0]->key;?></th>
                    </tr>
  
      </tbody>

            </table>
      
         
         
         <table>
<tr>
<td> 
<table cellspacing="0" id="table-basic" class="table table-sm table-bordered table-striped"  style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
	   <thead>
                    <tr >
                	<th>科目名称</th>
                
                    </tr>
                </thead>
 
 
  <?php 

 $json_arr = json_decode($json,true);
$students_list = $json_arr['data']['students'];

 $json_arr2 = json_decode($json2,true);
$students_list2 = $json_arr2['data'];


 foreach($students_list as $k=>$v){
    foreach($v['subjectRank'] as $subject_code=>$r){
  }
 };

foreach($students_list2 as $k2=>$v2){
    foreach($v2['papers'] as $subject_code2=>$r2){
    	  
};};
$t=array_intersect_key($v2['papers'],$v['subjectRank']);
$t=array_column($t,'subject','pindex');
$km = json_encode($t ,JSON_UNESCAPED_UNICODE);


 foreach($t as $k3=>$v3){?>
	<tr>

    <th >
    	<?php
    echo $v3;echo '</br>';};
    ?>
   </th>
  </tr> 
    


  </table>
  
  </td>
<td>    <table cellspacing="0" id="table-basic" class="table table-sm table-bordered table-striped"  style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
	   <thead>
                    <tr>
                        <th>分数</th>
                        <th>班排</th>
                        <th>年排</th>
                
               
                    </tr>
                </thead>
                
                 <?php
$json_arr = json_decode($json,true);
$students_list = $json_arr['data']['students'];
foreach($students_list as $k=>$v){
    foreach($v['subjectRank'] as $subject_code=>$r){?>
	<tr>
		 <th>
     <?php  
     
     echo $r['score'];
      
echo "<br/>";
  ?></th>
    <th><?php

        if($r['class']==1 or $r['class']==2 or $r['class']==3 
            ){
echo "[隐私]";}else{echo $r['class']
;}
      
echo "<br/>";
?></th>
    <th><?php

 
        if($r['school']==1 or $r['school']==2 or $r['school']==3 
              or $r['school']==4 or $r['school']==5 or $r['school']==6
               or $r['school']==7 or $r['school']==8 or $r['school']==9
               or $r['school']==10){
echo "[隐私]";}else{echo $r['school']
;}
      
echo "<br/>";
?></th>

      

                    </tr>
  	<?php
		
    }
} ;
?></table></td>
</tr>
</table>
         
         
         
         
         

  </div>
   </div>

  <div>

      </div>
  </div>


</body>

</html>


  

  