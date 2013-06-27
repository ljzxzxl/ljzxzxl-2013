<?php
$str = "<InitApp>
   <App>
      <appName>离线下载</appName>
      <url>http://www.offline.com</url>
      <appDesc>离线下载应用</appDesc>
      <appType>r</appType>
      <appDirName>离线下载</appDirName>
      <storageUser>y</storageUser>
   </App>
</InitApp>
";
$obj = simplexml_load_string($str);
echo $obj->App->appName;
print_r($obj);
?>