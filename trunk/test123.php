<?php
 /**
 *获取齐家用户中心数据API请求方法
 *
 **/
function jia_php_post($url,$data){
	#PHP REST client
	error_reporting(0);

	$method = 'POST';
	$headers = array(
	  'Accept: application/json',
	  'Content-Type: application/x-www-form-urlencoded'
	);

	$handle = curl_init();
	$fdata  = fopen('php://memory',"w+");
	fwrite($fdata, $data);
	rewind($fdata);
	 
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	# sometimes we need this for https to work
	curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

	switch($method)
	{
		case 'POST':
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		break;
		case 'PUT':
		curl_setopt($handle, CURLOPT_PUT, true);
		curl_setopt($handle, CURLOPT_INFILE, $fdata);
		curl_setopt($handle, CURLOPT_INFILESIZE, strlen($data));
		break;
		case 'DELETE':
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
		break;
	}
	
	$response = json_decode($raw_response, true);
	$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	return $raw_response = curl_exec($handle);
}

/**
 *获取齐家用户商家ID方法
 *
 **/
function get_user_shop_id($user_id){
	if(intval($user_id)){
		$jia_post_url = "http://10.10.20.126:9101/shopConfig/getAllShopByUserId?userId=".$user_id;
		$jia_post_data = "";
		$obj = json_decode(jia_php_post($jia_post_url,$jia_post_data));
		$array = object_array($obj);
		$user_shop_id = $array["result"]["0"]["id"];
		return intval($user_shop_id);
	}else{
		return false;
	}
}

/**
 *Object转array
 *
 **/
function object_array($array)
{
	if(is_object($array))
	{
		$array = (array)$array;
	}
	if(is_array($array))
	{
		foreach($array as $key=>$value)
		{
			$array[$key] = object_array($value);
		}
	}
	return $array;
}

echo get_user_shop_id("100000713");
?>