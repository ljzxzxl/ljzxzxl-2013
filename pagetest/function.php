<?php

function url_check($url){
	if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){
		$url = 'http://'.$url.'/';
		return $url;
	}else{
		return $url;
	}
}

function url_analysis($url, $host = ''){
	if($host){
		if(!preg_match('/http(.*?):\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){
			$url = 'http://'.$host.$url.'/';
		}
	}
	$snoopy = new Snoopy();
	$start = time() + microtime();
	$snoopy->fetch($url);
	$end = time() + microtime();
	$timer = $end - $start;
	$size = format_kb(strlen($snoopy->results));
	$status = $snoopy->response_code;
	$status = str_replace('HTTP/1.0 ','',$status);
	$status = str_replace('HTTP/1.1 ','',$status);
	$arr_url = parse_url($url);
	$host = $arr_url['host'];
	$ip = gethostbyname($host);
	$array = array(
				'url' => $url,
				'size' => $size,
				'status' => $status,
				'host' => $host,
				'ip' => $ip,
				'time' => round($timer*1000,2),
				'timer' => round($timer*100/3,2),
				'timel' => 100-round($timer*100/3,2)
			);
	return $array;
}

function format_bytes($size){
	$units = array(' B', ' KB', ' MB', ' GB', ' TB');
	for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
	return round($size, 2).$units[$i];
}

function format_kb($size){
	$units = array(' B', ' KB', ' MB', ' GB', ' TB');
	for ($i = 0; $i < 1; $i++) $size /= 1024;
	return round($size, 2).$units[$i];
}

//$str为要进行截取的字符串，$length为截取长度（汉字算一个字，字母算半个字）
function strCut($str,$length)
{
	$str = trim($str);
	$string = "";
	if(strlen($str) > $length)
	{
		for($i = 0 ; $i<$length ; $i++)
		{
			if(ord($str) > 127)
			{
				$string .= $str[$i] . $str[$i+1] . $str[$i+2];
				$i = $i + 2;
			}
			else
			{
				$string .= $str[$i];
			}
		}
		$string .= "...";
		return $string;
	}
	return $str;
}

?>