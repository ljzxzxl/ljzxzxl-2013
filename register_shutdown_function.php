<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>register_shutdown_function示例</title>
</head>
<body>
 <?php
 $starttime=microtime(true); 
  
function Test(){  
 $starttime=microtime(true);    
 if(!file_exists('Test.txt')){     //判断如果文件不存在!!
    $Str = fopen('Test.txt',"w+");        
    fwrite($Str,'我是在最后写进来的.时间:$starttime');
    fclose($Str);
 echo "创建完成!创建时间:$starttime";
}
else { //如果存在;
    echo '文件已经存在';
}
}
register_shutdown_function('Test');
echo "程序开始:".$starttime."<br>";
for($i=0;$i<1000;$i++){
 echo "Echo<br/>";
}
exit;
?> 
</body>
</html>