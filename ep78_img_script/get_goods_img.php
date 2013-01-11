<?php
/**
 * 衣品网(http://www.ep78.com/)商品详情图片下载专用脚本
 *
 * @author  Xeylon Zhou
 * @date  20130108
 */

//print_r($_REQUEST);
if(!empty($_REQUEST["goods_url"])){

	//抓取不受时间限制
	set_time_limit(0);
	date_default_timezone_set("PRC");
	error_reporting(E_ALL);
	
	$url = $_REQUEST["goods_url"];
	//$url = "http://www.ep78.com/product-853.html";
	
	//获取html源代码
	$str = file_get_contents($url);
	//图片解析
	$img_info = imgs_impose_dispose($str);
	//print_r($img_info);
	//得到图片url一维数组
	$img_url_array = $img_info[2];
	//print_r($img_url_array);
	
	//定义并创建保存图片的文件夹
	$new_dir = get_html_title($str)."_".date("Y-m-d_H:i:s");
	//$new_dir = "test";
	$new_dir_name = make_dir($new_dir);
	echo "保存文件夹：".iconv("gb2312","utf-8",$new_dir_name);
	
	//保存图片
	foreach($img_url_array as $key => $value) {
		$path = $new_dir_name."/";
		$file = $value;
		$img_info = getimageinfo($file);
		$tmp_name = get_unique();
		$new_name = intval($img_info["width"]) == 300?$tmp_name."_s":$tmp_name;
		if((intval($img_info["width"]) >= 300) && (intval($img_info["height"]) >= 300)){
			if(img_save($file,$path.$new_name.$img_info["type"])){
				echo "<pre>图片：{$value} 下载成功！</pre>";
			}else{
				echo "<pre style='color:#F00'>图片：{$value} 下载失败！</pre>";
			}
		}
	}
}else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><script>alert('请输入url！');history.back()</script>";
	exit;
}
	//图片解析
	function imgs_impose_dispose($str){
		if($str){
			if(preg_match_all("/<img(.+?)src=\"(.*?)\"[^>]*>/i",$str,$matches)){
				return $matches;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	//图片保存
	function img_save($file,$path){
		if($file){
			//$file_path=iconv("utf-8","gb2312",$path);
			//echo $file_path;exit;
			if(copy($file, $path)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	//通过微秒时间获得唯一ID
	function get_unique(){
		list($msec, $sec) = explode(" ",microtime());
		return $sec.intval($msec*1000000);
	}
	
	//创建文件夹
	function make_dir($name){
		if(!file_exists($name))
		{
			//特殊字符过滤
			$dir_name = str_replace(array(","," ","'","\\","\t","\r\n","\n","\r",":"),array('','','','','','','','',''),$name);
			$new_dir_name = iconv("UTF-8","GB2312//IGNORE",$dir_name);
			mkdir($new_dir_name);
			return $new_dir_name;
		}else{
			return false;
		}
	}
	
	//获取远程图片详细信息
	function getimageinfo($img){
		$img_info = @getimagesize($img);
		switch($img_info[2]){
			case 1:
			$imgtype = ".gif";
			break;
			case 2:
			$imgtype = ".jpg";
			break;
			case 3:
			$imgtype = ".png";
			break;
		}
		$img_type = empty($imgtype)?"":$imgtype;
		$new_img_info = array(
			"width" => $img_info[0],
			"height" => $img_info[1],
			"type" => $img_type,
		);
		return $new_img_info;
	}
	
	//获取网页字符串的title标签
	function get_html_title($str){
		if($str){
			$reg="/<title>(.*)\<\/title>/";
			preg_match($reg,$str,$arr);
			return $arr[1];
		}else{
			return false;
		}
	}

?>