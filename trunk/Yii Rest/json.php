<?php
$str = '{"requestUrl":"http://localhost/jiazhuangxiu/test/yii/yii/demos/blog-rest/index.php/api/posts","requestMethod":"POST","requestBody":"title=XXX 333&content=Bla&status=1&author_id=1","headers":["Content-type","application/x-www-form-urlencoded ","X_ASCCPE_USERNAME","demo","X_ASCCPE_PASSWORD","demo"]}';
$arr = json_decode($str,true);
print_r($arr);
echo '<hr>';

$str = '{"requestUrl":"http://localhost/~diggindata/yii-blog-rest/index.php/api/posts/15","requestMethod":"DELETE","requestBody":"","headers":["X_ASCCPE_USERNAME","demo","X_ASCCPE_PASSWORD","demo"]}';
$arr = json_decode($str,true);
print_r($arr);
echo '<hr>';

$str = '{"requestUrl":"http://localhost/~diggindata/yii-blog-rest/index.php/api/posts","requestMethod":"GET","requestBody":"","headers":["X_ASCCPE_PASSWORD","demo","X_ASCCPE_USERNAME","demo"]}';
$arr = json_decode($str,true);
print_r($arr);
echo '<hr>';

$str = '{"requestUrl":"http://localhost/~diggindata/yii-blog-rest/index.php/api/posts/1","requestMethod":"GET","requestBody":"","headers":["X_ASCCPE_PASSWORD","demo","X_ASCCPE_USERNAME","demo"]}';
$arr = json_decode($str,true);
print_r($arr);
echo '<hr>';

?>