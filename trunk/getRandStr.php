<?php
function getRandStr($length) {  
$str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$randString = ''; 
$len = strlen($str)-1; 
for($i = 0;$i < $length;$i ++){ 
$num = mt_rand(0, $len); 
$randString .= $str[$num]; 
} 
return $randString ;  
}

//使用方法如下
$test=getRandStr($length=16);
echo $test;
?>