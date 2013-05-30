<?php
set_time_limit(13600);  //设置时间
date_default_timezone_set("PRC");
$conn=@mysql_connect('localhost','root','goodlusslulu'); //连接数据库
@mysql_select_db('renren',$conn);
@mysql_query("SET NAMES utf8");

$fp_in = fopen('data.txt', "r");
$i = 1;
while (!feof($fp_in)) {
	$line = fgets($fp_in);
	//$str .= $line.',';
	//echo authcode($line);
	//echo date('Y-m-d G:i:s',$line);
	$a = $i + 5;
	echo "UPDATE zx_tuku SET shop_id = '{$line}' WHERE id > {$i} and id <= {$a};";
	//echo "<br/>";
	//echo $i;
	$i = $i + 5;
	echo "<br/>";
	//$u=explode('	', $line);
}
echo 'OK';

?>