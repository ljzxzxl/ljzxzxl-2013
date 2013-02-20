<?php
$remote = "http://i3.xlpan.kanimg.com/img?ui=74000844&g=D8588554F596E3348B986B59C76B10C51E0546AA&n=c6a1f7a2-70fb-48c2-b2b9-c34ca85238c8&scn=tel2&r=8159&st=1&si=jpg&t=6&s=680X";
$local = "D:/1.jpg";
/*$nameArr = array("a","b","c","d","e");

for($i=0;$i<10;$i++) {
$post_data = array (
    "username" => $nameArr[rand(0,5)].rand(0,1000000),
    "email" => rand(100000,20000000)."@qq.com",
    "password" => "111111111",
    "confirm_password" => "1211111111",
    "extend_field2" => "654333311257",
    "extend_field3" => "0551-5588774",
    "extend_field4" => "0551-5588774",
    "extend_field5" => "13865498754",
    "sel_question" => "friend_birthday",
    "passwd_answer" => "1990-01-28",
    "agreement" => 1,
    "act" => "act_register"
);*/


$cp = curl_init($remote);
$fp = fopen($local,"w");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($cp, CURLOPT_FILE, $fp);
curl_setopt($cp, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_exec($cp);
$info = curl_getinfo($cp);
echo "获取". $info["url"] . "耗时". $info["total_time"] . "秒";
curl_close($cp);
//fclose($fp);
//print_r($out);
//}
?>