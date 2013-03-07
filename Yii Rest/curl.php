<?php
 /**
 *Rest API请求测试方法
 *
 **/
function createApiCall($url, $method, $headers, $data = array())
    {
        if ($method == 'PUT')
        {
            $headers[] = 'X-HTTP-Method-Override: PUT';
        }
 
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
 
        switch($method)
        {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($handle, CURLOPT_POST, true);
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $response = curl_exec($handle);
        return $response;
    }

$header = array(
	  'Content-Type: application/x-www-form-urlencoded',
	  'X_ASCCPE_USERNAME: demo',
	  'X_ASCCPE_PASSWORD: demo'
	);
$formvars["title"] = "aaa"; 
$formvars["content"] = "bbb"; 
$formvars["status"] = "1"; 
$formvars["author_id"] = "1"; 
//$post_url = "http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts";
//echo $arr = createApiCall($post_url,'POST',$header,$formvars);

//$post_url = "http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts/11";
//echo $arr = createApiCall($post_url,'DELETE',$header,$formvars);

//$post_url = "http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts";
//echo $arr = createApiCall($post_url,'GET',$header,$formvars);

$post_url = "http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts/10";
echo $arr = createApiCall($post_url,'GET',$header,$formvars);

?>