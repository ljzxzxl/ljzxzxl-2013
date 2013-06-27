<?php
//按指定的key过滤数组
$arr = array("a","c","d");
$array=array("a"=>1,"b"=>2,"c"=>3,"d"=>4,"e"=>5);

function array_key_filter($array = '',$arr = ''){
	if(is_array($array) && is_array($arr)){
		$array = array_filter($array);
		$arr = array_filter($arr);
		foreach($array as $k => $v){
			if(!in_array($k,$arr)){
				unset($array[$k]);
			}
		}
		return $array;
	}else{
		return false;
	}
}
print_r(array_key_filter($array,$arr));
?>