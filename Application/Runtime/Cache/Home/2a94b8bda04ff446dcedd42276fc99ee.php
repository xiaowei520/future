<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>小伟_______demo</title>
<meta http-equiv="Access-Control-Allow-Origin"
	content="http://localhost:4000">
<meta name="description" content="小伟_______demo" />
<meta name="keywords" content="小伟_______demo" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="Shortcut icon" href="<?php echo ($static_url); ?>/icon/favicon.ico" />
<!-- Bootstrap -->
<link href="<?php echo ($static_url); ?>/css/bootstrap.min.css" rel="stylesheet"
	media="screen">

<link href="<?php echo ($static_url); ?>/css/my.css" rel="stylesheet" media="screen">
<script src="<?php echo ($static_url); ?>/js/jquery.js"></script>

<script src="<?php echo ($static_url); ?>/js/bootstrap.min.js"></script>
<script>
	var n = 0;
</script>
<script type="text/javascript" src="<?php echo ($static_url); ?>/js/m.js" charset="gbk"></script>

<!-- IE8下 ，[firefox- 40.0.3]好坑的一个BUG 醉了。 已阻止跨源请求：同源策略禁止读取位于 http://localhost:4000/Public/default/fonts/glyphicons-halflings-regular.woff 的远程资源。（原因：CORS 头缺少 'Access-Control-Allow-Origin'）。 -->
<style type="text/css">
@font-face {
	font-family: 'Glyphicons Halflings';
	src: url(/Public/default/fonts/glyphicons-halflings-regular.eot);
	src: url(/Public/default/fonts/glyphicons-halflings-regular.eot?#iefix)
		format('embedded-opentype'),
		url(/Public/default/fonts/glyphicons-halflings-regular.woff2)
		format('woff2'),
		url(/Public/default/fonts/glyphicons-halflings-regular.woff)
		format('woff'),
		url(/Public/default/fonts/glyphicons-halflings-regular.ttf)
		format('truetype'),
		url(/Public/default/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular)
		format('svg')
}
</style>

</head>

<body data-spy="scroll" data-target=".navbar-example">

	<!--nav-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-logo" href="javascript:void(0)"><img
					src="<?php echo ($static_url); ?>/img/logo.png" height="100%" alt="ssssssssssss"></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">

				<ul class="nav navbar-nav navbar-right">
					<li><a href="javascript:void(0);"><i
							class="fa glyphicon glyphicon-transfer"></i> &nbsp;在线代码</a></li>


					<?php if($_SESSION['user_info']== true): ?><li>
						<div class="menu">
							<ul style="padding-left: 0px">
								<li><a href="javascript:void(0)"
									style="padding-top: 4px; padding-bottom: 6px; line-height: 40px;">
										<img src="http://www.jq22.com/tx/22.png" class="dltx" />
								</a>
									<ul>
										<li><a href="/userHome" style="height: 50px">&nbsp; </a></li>
										<li class="tpa"><a href="#" onclick="myout()">退出登录</a></li>
									</ul>
							</ul>
						</div>
					</li>
					<?php else: ?>
					<li><a href="#" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-user"></i> &nbsp;注册/登录<span class="sr-only">(current)</span>
					</a></li><?php endif; ?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>
	<!--end nav-->



	<!-- 模态框（Modal） -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content2 tcc">
				<div class="modal-header2 top20">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body tcck">

					<div class="input-group input-group-lg">
						<span class="input-group-addon" id="email"><i
							class="fa fa-envelope-o"></i></span> <input type="text"
							class="form-control" placeholder="请输入登录邮箱"
							aria-describedby="email" id="ema">
					</div>
					<div class="input-group input-group-lg top20">
						<span class="input-group-addon" id="pwd"><i
							class="fa fa-unlock-alt" style="width: 18px"></i></span> <input
							type="password" class="form-control" placeholder="请输入登录密码"
							aria-describedby="pwd" id="pw"> <span
							class="input-group-btn tccBut">
							<button class="btn btn-success" type="button" onclick="login()">登
								录</button>
						</span>
					</div>

				</div>

				<div class="modal-footer2">
					<div class="f">
						<a href="/account/forgetps">忘记密码?</a>
					</div>
					<div class="r">
						<a href="/account/register">注册新用户</a>
					</div>
					<div class="dr"></div>
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal -->
	</div>

<div class="container-fluid banner"></div>
<!--nav-->
<div
	class="jz container-fluid nav-bg m0 visible-lg visible-md visible-sm"
	id="menu_wrap">
	<div class="container m0" style="position: relative;">
		<a href="javascript:void(0)" _t_nav="n1" id="an1"><span
			class="sort"><i class="fa glyphicon glyphicon-sunglasses"></i>
				&nbsp;XXX <i class="fa glyphicon glyphicon-menu-down"></i></span></a>| <a
			href="javascript:void(0)" _t_nav="n2" id="an2"><span class="sort"><i
				class="fa glyphicon glyphicon-send"></i> &nbsp;输入 <i
				class="fa glyphicon glyphicon-menu-down"></i></span></a>| <a
			href="http://www.bejson.com/" target="_blank"><span class="sort">JSON在线工具</span></a>
	</div>

	<div class="container-fluid">
		<div id="n1" class="nav-zi ty" style="display: none;" _t_nav="n1">
			<ul class="list-inline container m0">
				<li><a href="javascript:void(0)"><i
						class="fa glyphicon glyphicon-send"></i> 背景</a></li>


			</ul>
		</div>
		<div id="n2" class="nav-zi ty" style="display: none;" _t_nav="n2">
			<ul class="list-inline container m0">
				<li><a href="javascript:void(0)"><i
						class="fa glyphicon glyphicon-send"></i> 拾色器</a></li>

			</ul>
		</div>
	</div>

</div>
<!--end nav-->

<!--主体-->
<div class="container-fluid m" id="zt">
	<div class="container m0 bod">
		<!--左-->

		<div class="col-lg-9 col-md-12 col-sm-12">

			<div class="col-lg-4 col-md-3 col-sm-4">
				<a href="javascript:void(0)"><img src="ss"></a>
				<div class="cover-info">
					<a href="javascript:void(0)"><h4>jquery三环立体式图片切换效果</h4></a> <small>jquery三环立体式图片切换效果</small>
				</div>
				<div class="cover-fields">
					<i class="fa fa-list-ul"></i> &nbsp; 幻灯片和轮播图,图片展示,滑块和旋转
				</div>
				<div class="cover-stat">
					<i class="fa fa-eye"></i><span class="f10"> &nbsp;52</span> <i
						class="fa fa-heart"></i></i><span class="f10"> &nbsp;0</span>
					<div class="cover-yh">
						<a href="mem115567" data-container="body" data-toggle="popover"
							data-placement="top" data-content="握了颗??草 "> <i
							class="fa fa-user-secret"></i>
						</a>
					</div>
				</div>
			</div>


			<div class="posts-nav-wrap">
				<ul class="posts-nav">
					<li class='next'><a href='index' class='next'>←</a></li>
				</ul>
			</div>


		</div>
		<!--end左-->

		<!--右-->

		<div class="col-lg-2 visible-lg" style="width: 200px">
			<ul class="list-group" style="margin-bottom: 10px">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="搜索插件.."
						style="height: 34px; margin-top: 8px;" id="searchtxt"> <span
						class="input-group-btn">
						<button class="btn btn-default" type="button" id="seobut"
							style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-left-width: 0px;">
							<i class="fa glyphicon glyphicon-search"></i>
						</button>
					</span>
					<script type="text/javascript">
						$("#seobut").click(function() {
							var seo = $("#searchtxt").val();
							if (seo.length > 1) {
								window.location.href = "search?seo=" + seo;
							}
						});
						$('#searchtxt').bind('keypress', function(event) {

							if (event.keyCode == "13") {
								var seo = $("#searchtxt").val();
								if (seo.length > 1) {
									window.location.href = "search?seo=" + seo;
								}
							}
						});
					</script>
				</div>
			</ul>


			<ul class="list-group">
				<a class="list-group-item on" href="jq1-jq1" data-para="time"><i
					class="fa glyphicon glyphicon-transfer"></i> &nbsp;最新发布</a>
				<a class="list-group-item" href="jq1-jq4" data-para="comments"><i
					class="fa glyphicon glyphicon-header"></i> &nbsp;最多收藏</a>
				<a class="list-group-item" href="jq1-jq2" data-para="comments"><i
					class="fa glyphicon glyphicon-compressed"></i> &nbsp;最多评论</a>
				<a class="list-group-item" href="jq1-jq3" data-para="downloads"><i
					class="fa glyphicon glyphicon-floppy-save"></i> &nbsp;最多下载</a>
				<a class="list-group-item" href="jq1-jq8" data-para="ie8"><i
					class="fa glyphicon glyphicon-sound-5-1"></i> &nbsp;兼容IE8</a>
				<a class="list-group-item" href="jq1-jq6" data-para="ie6"><i
					class="fa glyphicon glyphicon-thumbs-up"></i> &nbsp;兼容IE6</a>
			</ul>
		</div>

		<!--end右-->


	</div>
</div>

<!--end主体-->









<!--底部-->


<nav class="copyright navbar-fixed-bottom" role="navigation"
	style="background: #111; font-size: 13px; text-align: center; color: #555555; padding-top: 28px; padding-bottom: 28px; border-top: 1px solid #303030;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="align: center; color: #ffffff;">
				<span style="align: center;">Copyright &copy;ssssssss</span> | <span
					style="align: center;">ssssssssssssss</span> | <span
					style="align: center;">sdasdasd</span>
			</div>
		</div>
	</div>
</nav>

<!--end底部-->

</body>
</html>