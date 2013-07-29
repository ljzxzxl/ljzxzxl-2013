<?php
/**
 * 短网址
 * 琼台博客
 */
 
function urlShort($url){
    $url= crc32($url);
    $result= sprintf("%u", $url);
    $sUrl= '';
    while($result>0){
        $s= $result%62;
        if($s>35){
            $s= chr($s+61);
        } elseif($s>9 && $s<=35){
            $s= chr($s+ 55);
        }
        $sUrl.= $s;
        $result= floor($result/62);
    }
    return $sUrl;
}
 
$url = 'www.qttc.net';
$sUrl = urlShort($url);
 
echo '<meta charset="utf-8" />';
echo '网址：'.$url.'<br />';
echo '短网址：'.$sUrl;
 
?>