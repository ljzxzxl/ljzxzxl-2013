<?php
$fp = file("application.log");

$last_line = 10;
$line = count($fp) - 1;
$i=1;
while($i<=$last_line){
	echo $fp[$line].'<br/>';
	$i++;
	$line--;
}
?>