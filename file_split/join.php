<?php
$mov = file_get_contents("split_hash.txt"); //读取分割文件的信息
$list = explode("\r\n",$mov);
$fp = fopen("test1.exe","ab"); //合并后的文件名
foreach($list as $value)
{
if(!empty($value)) {
$handle = fopen($value,"rb");
fwrite($fp,fread($handle,filesize($value)));
fclose($handle);
unset($handle);
}
}
fclose($fp);
?>