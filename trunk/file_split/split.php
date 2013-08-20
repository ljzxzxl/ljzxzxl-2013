<?php
$i = 0; //分割的块编号
$fp = fopen("test.exe","rb"); //要分割的文件
$file = fopen("split_hash.txt","a"); //记录分割的信息的文本文件
while(!feof($fp))
{
$handle = fopen("test.exe.{$i}","wb");
fwrite($handle,fread($fp,5000000)); //5000000 可以自定义.就是每个所分割的文件大小
fwrite($file,"test.exe.{$i}\r\n");
fclose($handle);
unset($handle);
$i++;
}
fclose ($fp);
fclose ($file);
echo "ok";
?>