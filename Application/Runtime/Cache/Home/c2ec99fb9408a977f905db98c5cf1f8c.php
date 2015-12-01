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
<link href="<?php echo ($static_url); ?>/css/dll.css" rel="stylesheet" media="screen">

<div class="login">
	<div class="loingnr">
		<div class="modal-body">

			<div class="input-group input-group-lg">
				<span class="input-group-addon" id="sizing-s1"><i
					class="fa fa-envelope-o" style="width: 18px"></i></span> <input
					id="myemail" class="form-control" placeholder="请输入登录邮箱"
					aria-describedby="sizing-addon1" type="text" name="name" size="30"
					onblur="emailgs(this)"> <span
					class="input-group-btn tccBut"> <a href="#"
					onclick="yzmfs()" id="bt" class="btn btn-success "
					style="width: 130px; font-size: 15px; line-height: 28px">获取验证码</a>
				</span>
			</div>
			<div class="alert alert-danger errts top10" id="empdts" role="alert"
				style="display: none">
				<i class="fa fa-info-circle"></i> <span id="erremailts">
					此邮箱已经被注册过</span>
			</div>

			<div class="input-group input-group-lg top20">
				<span class="input-group-addon" id="sizing-s2"><i
					class="fa fa-user-secret" style="width: 18px"></i></span> <input
					type="text" class="form-control" id="myhm" placeholder="用户名"
					aria-describedby="sizing-addon1" onblur="yhmok(this)">
			</div>


			<div class="input-group input-group-lg top20">
				<span class="input-group-addon" id="sizing-s5"><i
					class="fa fa-qrcode" style="width: 18px"></i></span> <input type="text"
					class="form-control" id="yzm" placeholder="请输入验证码"
					aria-describedby="sizing-addon1">
			</div>
			<div class="input-group input-group-lg top20">
				<span class="input-group-addon" id="sizing-s3"><i
					class="fa fa-lock" style="width: 18px"></i></span> <input type="password"
					class="form-control" id="pwd1" placeholder="请输入登录密码"
					aria-describedby="sizing-addon1">
			</div>
			<div class="input-group input-group-lg top20">
				<span class="input-group-addon" id="sizing-s4"><i
					class="fa fa-key" style="width: 18px"></i></span> <input type="password"
					class="form-control" id="pwd2" placeholder="确认登录密码"
					aria-describedby="sizing-addon1" onblur="yzm()"> <span
					class="input-group-btn tccBut"> <input type="button"
					class="btn btn-success" style="width: 130px" onclick="tj()"
					value="注册">
				</span>
			</div>
			<p>
				<input type="checkbox" class="check" checked>同意<a
					class="modalLink" href="#" class="btn btn-default"
					data-toggle="tooltip" data-html="true" data-placement="top"
					title="事实是事实">《注册声明》《版权声明》</a>
			</p>



		</div>
	</div>

</div>


<script type="text/javascript" charset="utf-8">
	//邮箱验证
	var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	function emailgs(txt) {
		
		if (!myreg.test(txt.value) || txt.value.length >= 30) {
			$("#myemail").addClass("err");
			$("#myemail").attr('placeholder', '邮箱格错误')
		} else {
			$("#myemail").removeClass("err");
		/*	var emyz = $.ajax({
				type : 'post',
				url : 'emailpd.aspx',
				data : {
					em : txt.value
				},
				cache : false,
				dataType : 'text',
				success : function(data) {
					if (data == "y") {
						$("#empdts").css("display", "none");
					} else {
						$("#empdts").css("display", "block");
					}
				},
				error : function() {
				}
			});
		*/
		}
		
	}
	//验证用户名
	function yhmok(txt) {
		if (txt.value.length >= 30 || txt.value.length < 2) {
			$("#myhm").addClass("err");
			$("#myhm").attr('placeholder', '用户名长度范围2-30之间')
		} else {
			$("#myhm").removeClass("err");
		}
	}

	//验证码
	function yzmfs() {
		var myemail = $("#myemail").val();
		if (!myreg.test(myemail) || myemail.length >= 30) {
			$("#myemail").addClass("err");
			$("#myemail").attr('placeholder', '邮箱格错误')
		} else {
			var yz = $.ajax({
				type : 'post',
				url : '/ajax/j_email',
				data : {
					em : myemail
				},
				cache : false,
				dataType : 'text',
				success : function(data) {
					$("#empdts").css("display", "none");
					var obj = eval('(' + data + ')');
					
					if (obj.code == '200') {
						$("#bt").html("验证码发送成功");
					} else if (obj.code == '-101') {
						$("#empdts").css("display", "block");
					}
					else{
						//其他未知原因暂不考虑
					}
				},
				error : function() {
				}
			});
		}

	}
	//密码
	function yzm() {
		var mpwd1 = $("#pwd1").val();
		var mpwd2 = $("#pwd2").val();
		if (mpwd1 != mpwd2) {
			$("#pwd2").addClass("err");
			$("#pwd2").attr('placeholder', '两次输入的密码不一直')
		} else {
			$("#pwd2").removeClass("err");
		}

	}

	function tj() {
		var myemail = $("#myemail").val();
		var myhm = $("#myhm").val();
		var myzm = $("#yzm").val();

		var mpwd1 = $("#pwd1").val();
		var mpwd2 = $("#pwd2").val();

		if (!myreg.test(myemail) || myemail.length >= 30) {
			$("#myemail").addClass("err");
			$("#myemail").attr('placeholder', '邮箱格式错误')
		} else if (myhm.length >= 30 || myhm.length < 2) {
			$("#myhm").addClass("err");
			$("#myhm").attr('placeholder', '用户名错误')
		} else if (mpwd1 != mpwd2 || mpwd2.length < 5) {
			$("#pwd2").addClass("err");
			$("#pwd2").attr('placeholder', '密码错误')
		} else {
			$.post("/ajax/j_register", {
				Action : "post",
				mem : myemail,
				myh : myhm,
				myz : myzm,
				mp1 : mpwd1,
				mp2 : mpwd2
			}, function(data) {
				if (data.code == "200") {
					alert('恭喜您，注册成功！');
					//window.location.href = "account/";
				}
				else{
					alert('很抱歉，注册失败！');
				}

			}, "json");

		}

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