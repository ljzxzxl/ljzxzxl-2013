<?php
date_default_timezone_set("PRC");
//echo(strtotime("2013-02-01 08:37:19"));
  function foo($a){
       return $a = $a + 2;
  }
$a = 2;
$result = foo($a);
echo $result;
$a=array("a"=>"Cat","b"=>"Dog");
print_r(array_unshift($a,"Horse"));
?>