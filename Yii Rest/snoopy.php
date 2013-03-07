<?php 
$formvars["title"] = "test"; 
$formvars["content"] = "Bla"; 
$formvars["status"] = "1"; 
$formvars["author_id"] = "1"; 
$action = "http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts"; 
include "Snoopy/Snoopy.class.php"; 
$snoopy = new Snoopy; 
$snoopy->cookies["PHPSESSID"] = "25faa87b507b31799387c380bb3a24ec"; //伪装sessionid 
$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)"; //伪装浏览器 
$snoopy->rawheaders["Content-type"] = "application/x-www-form-urlencoded"; //cache 的http头信息 
$snoopy->rawheaders["X_ASCCPE_USERNAME"] = "demo";
$snoopy->rawheaders["X_ASCCPE_PASSWORD"] = "demo";
//$snoopy->submit($action,$formvars); 
//echo $snoopy->results; 

$action = "http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts"; 
include "Snoopy/Snoopy.class.php"; 
$snoopy = new Snoopy; 
$snoopy->cookies["PHPSESSID"] = "25faa87b507b31799387c380bb3a24ec"; //伪装sessionid 
$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)"; //伪装浏览器 
$snoopy->rawheaders["Content-type"] = "application/x-www-form-urlencoded"; //cache 的http头信息 
$snoopy->rawheaders["X_ASCCPE_USERNAME"] = "demo";
$snoopy->rawheaders["X_ASCCPE_PASSWORD"] = "demo";
//$snoopy->fetch($action);
//echo $snoopy->results; 

$action = "http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts/1"; 
include "Snoopy/Snoopy.class.php"; 
$snoopy = new Snoopy; 
$snoopy->cookies["PHPSESSID"] = "25faa87b507b31799387c380bb3a24ec"; //伪装sessionid 
$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)"; //伪装浏览器 
$snoopy->rawheaders["Content-type"] = "application/x-www-form-urlencoded"; //cache 的http头信息 
$snoopy->rawheaders["X_ASCCPE_USERNAME"] = "demo";
$snoopy->rawheaders["X_ASCCPE_PASSWORD"] = "demo";
$snoopy->fetch($action);
echo $snoopy->results; 
?>