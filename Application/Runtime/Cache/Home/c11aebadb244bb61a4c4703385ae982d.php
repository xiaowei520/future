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




<!--主体-->

<div class="container m0 bod top70" id="zt">
	<div class="row">
		<div class="col-md-6 t0b0 ">
			<ol class="breadcrumb t0b0">
				<li><a href="/index">首页</a></li>
				<li class="active">个人中心</li>
			</ol>
		</div>
		<div class="col-md-6 t0b0 txtr"></div>
	</div>

	<div class="row top10 mym">
		<!--左-->

		<div class="col-md-4 myleft">
			<div class="myleft-n">
				<h6>PROMULGATOR</h6>
				<a href="#" data-toggle="modal" data-target="#exampleModal2"> <img
					id="tou" src="tx/22.png" class="f imgr20">
				</a>
				<div class="f imgf20">
					<h4><?php echo ($user_info['account_name']); ?></h4>
					<i class="fa fa-map-marker"></i>火星
				</div>

				<div class="df"></div>
			</div>
			<div class="df"></div>
			<div class="myleft-n">

				<ul class="list-group">
					<li class="list-group-item"><i class="fa fa-user-secret"></i>&nbsp;第
						<?php echo ($user_info['id']); ?>位会员</li>
					<li class="list-group-item"><span class="badge red"><?php echo ($user_info['wealth_value']); ?></span> <i
						class="fa fa-btc"></i>&nbsp;我的jQ币</li>
					<li class="list-group-item"><span class="badge"><?php echo ($user_info['notice_num']); ?></span> <i
						class="fa fa-heart"></i>&nbsp;关注我的人数</li>
				</ul>


				<a class="btn btn-success" href="zxzf.aspx" target="_blank"
					style="width: 100%"><i class="fa fa-jpy"></i>购买jQ币</a> <a
					class="btn btn-info top10" href="jquerySubmit.aspx"
					style="width: 100%">发布资源获得jQ币</a>

				<div class="alert alert-warning top20" role="alert"
					style="background-color: #fefcee; padding-top: 7px; padding-bottom: 7px">
					<i class="fa fa-lightbulb-o"></i> 最新修复上传插件中代码内容过滤问题！<br /> <i
						class="fa fa-lightbulb-o"></i> 签到功能完成，可以签到获得jq币！<br /> <i
						class="fa fa-lightbulb-o"></i> 现在可以通过点击↑上方头像来修改头像了！<br />
				</div>



			</div>
			<div class="df"></div>
		</div>

		<!--end 左-->
		<!--右-->
		<div class="col-md-8 myright">
			<div class="myright-n">
				<div class="myNav row">
					<a href="mem116344"><i class="fa fa-codepen"></i> 我发布的插件</a> <a
						href="msc116344"><i class="fa fa-heart"></i> 我收藏的插件</a> <a
						href="#"><i class="fa fa-user"></i> 资料</a> <a href="#">账号</a> <a
						href="#" data-toggle="modal" data-target="#exampleModal"><i
						class="fa fa-pencil-square-o"></i> 签到</a>
				</div>
				<div class="row topx myMinh">

					<div class="spjz"></div>
				</div>
			</div>
		</div>
		<!--end 右-->
	</div>


	<!--end主体-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="exampleModalLabel">
						<i class="fa fa-pencil-square-o"></i> 签到
					</h4>
				</div>
				<div class="modal-body">
					<iframe src="" width="100%" height="100%"
						frameborder="0"></iframe>
				</div>
			</div>
		</div>
	</div>
	<!--end主体-->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="exampleModalLabel2">
						<i class="fa fa-picture-o"></i> 设置头像
					</h4>
				</div>
				<div class="modal-body" style="height: 550px">
					<iframe name="myFrame" src="myPhoto.aspx" width="100%"
						height="100%" frameborder="0"></iframe>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" class="btn btn-primary" onclick="tx()"
						data-dismiss="modal">保存头像</button>
				</div>
			</div>
		</div>
	</div>
	<script>

	</script>


	<!--end底部-->

	<script type="text/javascript">
		function tx() {
			$.ajax({
				type : "POST",
				url : "myPhotoSave.aspx",
				data : "tx=" + myFrame.window.tx,
				success : function(msg) {
					if (msg != "n") {
						$("#tou").attr('src', "tx/" + msg + ".png");
					}
				}
			});

		}
		function clockms(id) {
			var yz = $.ajax({
				type : 'post',
				url : 'mess.aspx',
				data : {
					id : id
				},
				cache : false,
				dataType : 'text',
				success : function(data) {

				},
				error : function() {
				}
			});
		}
	</script>


	

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