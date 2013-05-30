<?
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

//echo "Status Code: $code<br />\n";
//echo $raw_response;
$url = 'http://10.10.21.126:10005/user/getUserInfo';
$data = '{"id":"3553220"}';
$obj = json_decode(jia_php_post($url,$data));
echo  $obj -> result -> face_image_url;
print_r($obj);