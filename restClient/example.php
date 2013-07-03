<?php
include_once('RestClient.php');
// dummy example of basic query. 

$header = array(
	  'Content-Type: application/x-www-form-urlencoded',
	  'X_ASCCPE_USERNAME: demo',
	  'HTTP_X_OAUTH: 9727da5fdd3099dff1ecb75bebda38d4'
	);

//geoloc-find nearby
$query = RestClient::get("http://localhost/yxz/api/folder/list",$params=null,$user=null,$pwd=null,$contentType=null,$header);


var_dump($query->getResponse());
var_dump($query->getResponseCode());
var_dump($query->getResponseContentType());

//Note that 'format'=>'php' is in case you want to do something like :eval("\$str =$query->getResponse()");echo (print_r($str));
//feel free to use xml, json, any format you want.


?>