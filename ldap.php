<?php
// 本例使用到 connect, bind, search, interpret search
// result, close connection 等等 LDAP 的功能。
echo "<h3>LDAP 搜寻测试</h3>";
echo "连接中 ...";
$ds=ldap_connect("localhost");  // 先连上有效的 LDAP 服务器
echo "连上 ".$ds."<p>";
if ($ds) { 
    echo "Binding ..."; 
    $r=ldap_bind($ds);          // 匿名的 bind，为只读属性
    echo "Bind 返回 ".$r."<p>";
    echo "Searching for (sn=S*) ...";  // 找寻 S 开头的姓氏
    $sr=ldap_search($ds,"o=My Company, c=US", "sn=S*");  
    echo "Search 返回 ".$sr."<p>";
    echo "S 开头的姓氏有 ".ldap_count_entries($ds,$sr)." 个<p>";
    echo "取回姓氏资料 ...<p>";
    $info = ldap_get_entries($ds, $sr);
    echo "资料返回 ".$info["count"]." 笔:<p>";
    for ($i=0; $i<$info["count"]; $i++) {
        echo "dn 为: ". $info[$i]["dn"] ."<br>";
        echo "cn 为: ". $info[$i]["cn"][0] ."<br>";
        echo "email 为: ". $info[$i]["mail"][0] ."<p>";
    }
    echo "关闭链接";
    ldap_close($ds);
} else {
    echo "<h4>无法连接到 LDAP 服务器</h4>";
}
?>