<?php
if(!empty($_REQUEST["url"])){
	set_time_limit(0);
	date_default_timezone_set("PRC");
	error_reporting(E_ALL);
	require_once('Snoopy/Snoopy.class.php');
	require_once('simplehtmldom/simple_html_dom.php');
	require_once('function.php');
	$url = url_check($_REQUEST["url"]);
	$arr_url = parse_url($url);
	$host = $arr_url['host'];
	$ip = gethostbyname($host);
	if(!filter_var($ip, FILTER_VALIDATE_IP)){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><script>alert('抱歉，网址“{$url}”无效！');history.back()</script>";
		exit;
	}
	$result = url_analysis($url);
	// Create DOM from URL or file
	$html = file_get_html($url);
	$img_arr = $html->find('img');
	$link_arr = $html->find('link');
	$script_arr = $html->find('script');
	//foreach($script_arr as $element) 
       //if($element->src){echo $element->src . '<br>';}
}elseif($_POST["submit"]){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><script>alert('请输入url！');history.back()</script>";
	exit;
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>网页加载测试</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap是Twitter推出的一个用于前端开发的开源工具包。它由Twitter的设计师Mark Otto和Jacob Thornton合作开发，是一个CSS/HTML框架。Bootstrap中文网致力于为广大国内开发者提供详尽的中文文档、代码实例等，助力开发者掌握并使用这一框架。">
    <meta name="author" content="Bootstrap中文网">
    <meta name="keywords" content="Bootstrap,CSS,CSS框架,CSS framework,javascript,bootcss,bootstrap开发,bootstrap代码,bootstrap入门">
    <meta name="robots" content="index,follow">
    <meta name="application-name" content="bootcss.com">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<!-- Le javascript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar">

<div class="container">
<h2 class="text-center">网页加载时间测试脚本</h2>
<p><a target="_blank" href="http://www.bootcss.com/">Bootstrap</a>是Twitter推出的一个用于前端开发的开源工具包。它由Twitter的设计师Mark Otto和Jacob Thornton合作开发，是一个CSS/HTML框架。Bootstrap中文网致力于为广大国内开发者提供详尽的中文文档、代码实例等，助力开发者掌握并使用这一框架。</p>
<div class="text-center">
	<form id="url_form" method="post" name="url_form" action="">
    <div class="input-append">
    <input name="url" class="input-xxlarge" id="appendedInputButton" type="text" placeholder="请输入URL链接" value="<?php echo $url; ?>">
    <button class="btn" type="submit" name="submit" value="submit">开始测试</button>
    </div>
	</form>
</div>
	<div class="text-center">
	<table class="table table-condensed table-bordered table-striped responsive-utilities">
		<tbody>
              <tr>
                <th width="380px">text/html</th>
                <th width="85px">大小</th>
                <th width="70px">状态</th>
				<th>域</th>
				<th width="115px">IP</th>
                <th width="150px">时间线</th>
              </tr>
			  <?php if($url){ ?>
			  <tr>
                <td><a target="_blank" href="<?php echo $result['url']; ?>" title="<?php echo $result['url']; ?>"><?php echo strCut($result['url'],50); ?></a></td>
                <td class="muted"><?php echo $result['size']; ?></td>
				<td class="text-info"><?php echo $result['status']; ?></td>
				<td><code><?php echo $result['host']; ?></code></td>
				<td class="muted"><?php echo $result['ip']; ?></td>
				<td>
					<div class="progress">
					<div class="bar bar-success" style="width: <?php echo $result['timer']; ?>%;"></div>
					<div class="bar bar-warning" style="width: <?php echo $result['timel']; ?>%;"><?php echo $result['time'].'ms'; ?></div>
					</div>
				</td>
              </tr>
			  <tr>
                <th width="380px">text/css</th>
                <th width="85px">大小</th>
                <th width="70px">状态</th>
				<th>域</th>
				<th width="115px">IP</th>
                <th width="150px">时间线</th>
              </tr>
			  <?php $i = $link_s = $link_size_s = $link_time_s = 0; foreach($link_arr as $element){if($element->href){$result = url_analysis($element->href, $host); ?>
			  <tr>
                <td><a target="_blank" href="<?php echo $result['url']; ?>" title="<?php echo $result['url']; ?>"><?php echo strCut($result['url'],50); ?></a></td>
                <td class="muted"><?php echo $result['size']; ?></td>
				<td class="text-info"><?php echo $result['status']; ?></td>
				<td><code><?php echo $result['host']; ?></code></td>
				<td class="muted"><?php echo $result['ip']; ?></td>
				<td>
					<div class="progress">
					<div class="bar bar-success" style="width: <?php echo $result['timer']; ?>%;"></div>
					<div class="bar bar-warning" style="width: <?php echo $result['timel']; ?>%;"><?php echo $result['time'].'ms'; ?></div>
					</div>
				</td>
              </tr>
			  <?php $link_s = $i + 1; $i++; $link_size_s = $link_size_s + $result['size']; $link_time_s = $link_time_s + $result['time'];}} ?>
			  <tr>
                <th>共计<br/><?php echo $link_s; ?> 个</th>
                <th>大小<br/><?php echo $link_size_s; ?> KB</th>
                <th></th>
				<th></th>
				<th></th>
                <th>时间<br/><?php echo $link_time_s; ?> ms</th>
              </tr>
			  <tr>
                <th width="380px">text/javascript</th>
                <th width="85px">大小</th>
                <th width="70px">状态</th>
				<th>域</th>
				<th width="115px">IP</th>
                <th width="150px">时间线</th>
              </tr>
			  <?php $i = $script_s = $script_size_s = $script_time_s = 0; foreach($script_arr as $element){if($element->src){$result = url_analysis($element->src, $host); ?>
			  <tr>
                <td><a target="_blank" href="<?php echo $result['url']; ?>" title="<?php echo $result['url']; ?>"><?php echo strCut($result['url'],50); ?></a></td>
                <td class="muted"><?php echo $result['size']; ?></td>
				<td class="text-info"><?php echo $result['status']; ?></td>
				<td><code><?php echo $result['host']; ?></code></td>
				<td class="muted"><?php echo $result['ip']; ?></td>
				<td>
					<div class="progress">
					<div class="bar bar-success" style="width: <?php echo $result['timer']; ?>%;"></div>
					<div class="bar bar-warning" style="width: <?php echo $result['timel']; ?>%;"><?php echo $result['time'].'ms'; ?></div>
					</div>
				</td>
              </tr>
			  <?php $script_s = $i + 1; $i++; $script_size_s = $script_size_s + $result['size']; $script_time_s = $script_time_s + $result['time'];}} ?>
			  <tr>
                <th>共计<br/><?php echo $script_s; ?> 个</th>
                <th>大小<br/><?php echo $script_size_s; ?> KB</th>
                <th></th>
				<th></th>
				<th></th>
                <th>时间<br/><?php echo $script_time_s; ?> ms</th>
              </tr>
			  <tr>
                <th width="380px">image/jpg-png-gif</th>
                <th width="85px">大小</th>
                <th width="70px">状态</th>
				<th>域</th>
				<th width="115px">IP</th>
                <th width="150px">时间线</th>
              </tr>
			  <?php $i = $img_s = $img_size_s = $img_time_s = 0; foreach($img_arr as $element){if($element->src){$result = url_analysis($element->src, $host); ?>
			  <tr>
                <td><a target="_blank" href="<?php echo $result['url']; ?>" title="<?php echo $result['url']; ?>"><?php echo strCut($result['url'],50); ?></a></td>
                <td class="muted"><?php echo $result['size']; ?></td>
				<td class="text-info"><?php echo $result['status']; ?></td>
				<td><code><?php echo $result['host']; ?></code></td>
				<td class="muted"><?php echo $result['ip']; ?></td>
				<td>
					<div class="progress">
					<div class="bar bar-success" style="width: <?php echo $result['timer']; ?>%;"></div>
					<div class="bar bar-warning" style="width: <?php echo $result['timel']; ?>%;"><?php echo $result['time'].'ms'; ?></div>
					</div>
				</td>
              </tr>
			  <?php $img_s = $i + 1; $i++; $img_size_s = $img_size_s + $result['size']; $img_time_s = $img_time_s + $result['time'];}} ?>
			  <tr>
                <th>共计<br/><?php echo $img_s; ?> 个</th>
                <th>大小<br/><?php echo $img_size_s; ?> KB</th>
                <th></th>
				<th></th>
				<th></th>
                <th>时间<br/><?php echo $img_time_s; ?> ms</th>
              </tr>
			  <tr>
                <th>合计<br/><?php echo $link_s + $script_s + $img_s; ?> 个</th>
                <th>大小<br/><?php echo $link_size_s + $script_size_s + $img_size_s; ?> KB</th>
                <th></th>
				<th></th>
				<th></th>
                <th>时间<br/><?php echo $link_time_s + $script_time_s + $img_time_s; ?> ms</th>
              </tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
</div>

  </body>
</html>