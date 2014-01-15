<?php
set_time_limit(0);
$i = 1; //分割的块编号
$fp = fopen("test2.sql","rb"); //要分割的文件
$file = fopen("split_hash.txt","a"); //记录分割的信息的文本文件
while(!feof($fp))
{
$handle = fopen("test/test2.{$i}.sql","wb");
fwrite($handle,fread($fp,500000000)); //5000000 可以自定义.就是每个所分割的文件大小
fwrite($file,"test/test.exe.{$i}\r\n");
fclose($handle);
unset($handle);
$i++;
}
fclose ($fp);
fclose ($file);
echo "ok_".$i;
?>